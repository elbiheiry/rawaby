<?php

namespace App\Http\Controllers\Site;

use App\HomeSection;
use App\Product;
use App\Setting;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Checkout;
use App\Order;
use App\Mail\CheckoutMail;
use Mail;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $sections = HomeSection::all();
        $products = Product::where('active' , 1)->get();

        return view('site.pages.index' ,compact('sections' ,'products'));
    }

    public function postSubscribe(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email|unique:subscribers'
        ] ,[
            'email.required' => 'برجاء ادخال بريدك الالكتروني',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'email.unique' => 'هذا البريد الالكتروني مستخدم بالفعل'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => implode("<br>" , $v->errors()->all())];
        }

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        if ($subscriber->save()){
            return ['status' => 'success' ,'data' => 'شكرا لك علي التواصل معنا'];
        }

        return ['status' => 'error' ,'data' => 'خطا برجاء المحاوله لاحقا'];
    }
    
    public function getProduct(){
        $requests = Product::with('categories')->where('active' , 1)->get();
        $head_status = Setting::first()->value('head');

        return ['products' => $requests , 'head status' => $head_status];
    }
    
    public function postIndex(Request $request)
    {
        $checkout = new Checkout();

        $checkout->name = $request->name;
        $checkout->phone = $request->phone;
        $checkout->address = $request->address;
        $checkout->price = $request->price;
        $checkout->city = $request->city;
        $checkout->receive = $request->receive;
        $checkout->payment = $request->payment;
        if ($checkout->save()){
            $order = new Order();

            $order->name = $request->product_name;
            $order->qty = $request->qty;
            $order->price = $request->single_price;
            $order->kind = $request->kind;
            $order->type = $request->type;
            $order->cutting = $request->cutting;
            $order->packing = $request->packing;
            $order->head = $request->head;
            $order->comments = $request->comments;
            $order->minced = $request->minced;
            $order->weight = $request->weight;
            $order->total = $request->price;
            $order->checkout_id = $checkout->id;

            $message = '
            <!DOCTYPE html>
            <html>
                <head>
                    <title>طلب جديد</title>
                </head>
                <body>
                    <h1>هذه رساله من  : '.$request->name.'</h1>
                    <span> رقم الهاتف : '.$request->phone.'</span><br>
                    <span> المدينه : '.$request->city.'</span><br>
                    <span> العنوان : '.$request->address.'</span><br>
                    <span> طريقة التواصل : '.$request->receive.'</span><br>
                    <span> طريقه الدفع : '.$request->payment.'</span><br>
                    <span> اسم المنتج : '.$request->product_name.'</span><br>
                    <span> كميه المنتج : '.$request->qty.'</span><br>
                    <span> سعر المنتج : '.$request->price.'</span><br>
                    <span> الحجم : '.$request->kind.'</span><br>
                    <span> نوع الذبيحه : '.$request->type.'</span><br>
                    <span> التعليقات : '.$request->comments.'</span><br>
                    <span> اجمالي المبلغ : '.$request->total.'</span><br>
                </body>
            </html>
            ';

            $message = '
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>طلب جديد</title>
                    </head>
                    <body>
                    <h1>هذه رساله من  : '.$request->name.'</h1>
                    <span> رقم الهاتف : '.$request->phone.'</span><br>
                    <span> المدينه : '.$request->city.'</span><br>
                    <span> العنوان : '.$request->address.'</span><br>
                    <span> طريقة التواصل : '.$request->receive.'</span><br>
                    <span> طريقه الدفع : '.$request->payment.'</span><br>
                    <span> اسم المنتج : '.$request->product_name.'</span><br>
                    <span> كميه المنتج : '.$request->qty.'</span><br>
                    <span> سعر المنتج : '.$request->price.'</span><br>
                    <span> الحجم : '.$request->kind.'</span><br>
                    <span> نوع الذبيحه : '.$request->type.'</span><br>
                ';
                if($request->type != 'حي'){
                    $message.= '<span> طريقه التقطيع : '.$request->cutting.'</span><br>';
                    if(\App\Setting::first()->value('packing') == 1){
                        $message.= '<span> طريقه التغليف : '.$request->packing.'</span><br>';
                    }
                    $message.= '<span>مفروم : '.$request->minced.'</span><br>';
                    if($request->minced == 'نعم'){
                        $message.= '<span>كم كيلو : '.$request->weight.'</span><br>';
                    }
                    if(\App\Setting::first()->value('head') == 1){
                        $message.= '<span> الراس : '.$request->head.'</span><br>';
                    }
                }
                $message.= '<span> التعليقات : '.$request->comments.'</span><br>
                                <span> اجمالي المبلغ : '.$request->total.'</span><br>
                            </body>
                        </html>';

            Mail::to('majeed13955@gmail.com')->send(new CheckoutMail(
                $request->product_name ,
                $request->qty ,
                $request->price ,
                $request->kind ,
                $request->type ,
                $request->cutting ,
                $request->packing,
                $request->head ,
                $request->comments,
                $request->total ,
                $request->minced ,
                $request->weight ,
                $request->name ,
                $request->city ,
                $request->phone ,
                $request->address ,
                $request->receive ,
                $request->payment 
            ));
            $order->save();
            
        }
        return ['status' => 'success','title' => 'تم بنجاح اتمام العمليه ورقمها :  '.$order->id ,'url' => route('site.index')];
    }
}
