<?php

namespace App\Http\Controllers\Site;

use App\Checkout;
use App\City;
use App\Order;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CheckoutMail;
use Mail;

class CheckoutController extends Controller
{
    //
    public function getIndex()
    {
        $products = Cart::content();
        $cities = City::all();

        return view('site.pages.checkout.index' ,compact('products' ,'cities'));
    }

    public function postIndex(Request $request)
    {
        if(sizeof(Cart::content()) < 1){
            return ['status' => 'error','title' => 'لا يوجد منتجات لاكمال عمليه الدفع !'];
        }
        $checkout = new Checkout();

        $checkout->name = $request->name;
        $checkout->city = $request->city;
        $checkout->phone = $request->phone;
        $checkout->address = $request->address;
        $checkout->receive = $request->receive;
        $checkout->payment = $request->payment;
        $checkout->price = Cart::total();
        if ($checkout->save()){
            $products = Cart::content();
            foreach ($products as $product) {

                $order = new Order();

                $order->name = $product->name;
                $order->qty = $product->qty;
                $order->price = $product->price;
                $order->kind = $product->options['kind'];
                $order->type = $product->options['type'];
                $order->cutting = $product->options['cutting'];
                $order->packing = $product->options['packing'];
                $order->minced = $product->options['minced'];
                $order->weight = $product->options['weight'];
                $order->head = $product->options['head'];
                $order->comments = $product->options['comments'];
                $order->total = $product->subtotal();
                $order->checkout_id = $checkout->id;

                Mail::to('majeed13955@gmail.com')->send(new CheckoutMail(
                    $product->name ,
                    $product->qty ,
                    $product->price ,
                    $product->options['kind'] ,
                    $product->options['type'] ,
                    $product->options['cutting'] ,
                    $product->options['packing'],
                    $product->options['head'] ,
                    $product->options['comments'],
                    $product->subtotal() ,
                    $product->options['minced'],
                    $product->options['weight'],
                    $request->name ,
                    $request->city ,
                    $request->phone ,
                    $request->address ,
                    $request->receive ,
                    $request->payment 
                ));
                $order->save();
            }
            $lastId = Order::orderBy('id' ,'DESC')->first();

            Cart::destroy();

            return ['status' => 'success','title' => 'تم بنجاح اتمام العمليه ورقمها :  '.$lastId->id ,'url' => route('site.index')];
        }
    }
}
