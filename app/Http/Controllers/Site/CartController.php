<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{
    //
    public function getIndex()
    {
        $products = Cart::content();

        return view('site.pages.cart.index' ,compact('products'));

    }

    public function postCart(Request $request , Product $product)
    {
        // dd($request->all());
        if(!$request->type){
            return ['status' => 'error' ,'data' => 'يجب ان تقوم باختيار نوع الذبح'];
        }
        $items = Cart::content();

        foreach ($items as $item) {
            if ($item->id == $product->id){
                Cart::update($item->rowId , [
                    'qty' => $request->qty ?  : $item->qty + 1,
                    'options' => [
                        
                        'image' => $product->image,
                        'kind' => $request->kind ? : 'غير معروف',
                        'type' => $request->type ? : 'غير معروف',
                        'cutting' => $request->cutting ? : 'غير معروف',
                        'packing' => $request->packing ? : 'غير معروف',
                        'head' => $request->head ? : 'غير معروف',
                        'comments' => $request->comments ? : 'غير معروف',
                        'minced' => $request->minced,
                        'weight' => $request->weight ? : 'غير معروف'
                    ]
                ]);
                return ['status' => 'success' ,'data' => 'تم تحديث بيانات المنتج في عربه الشراء بنجاح' ,'html' => view('site.layouts.cart')->render()];
            }
        }
        Cart::add([
            'id' => $product->id,
            'name' => $product->name ,
            'qty' => $request->qty ?  : 1,
            'price' => $request->price ? : $product->categories()->get(['price'])->min('price'),
            'options' => [
                
                'image' => $product->image,
                'kind' => $request->kind ? : 'غير معروف',
                'type' => $request->type ? : 'غير معروف',
                'cutting' => $request->cutting ? : 'غير معروف',
                'packing' => $request->packing ? : 'غير معروف',
                'head' => $request->head ? : 'غير معروف',
                'comments' => $request->comments ? : 'غير معروف',
                'minced' => $request->minced,
                'weight' => $request->weight ? : 'غير معروف'
            ]
        ]);

//        $carts = Cart::content();

        return ['status' => 'success' ,'data' => 'تم اضافه المنتج لعربه الشراء بنجاح' ,'html' => view('site.layouts.cart')->render()];
    }

    public function postUpdate(Request $request , $rowId)
    {
        Cart::update($rowId , ['qty' => $request->qty]);

        $subtTotal = Cart::subtotal();

        $item = Cart::get($rowId);
        $rowTotal = $item->qty * $item->price;
        $tax = Cart::tax();
        $total = Cart::total();



        return ['status' => 'success' , 'subTotal' => $subtTotal ,'rowTotal' => $rowTotal ,'tax' => $tax ,'totalPrice' => $total];
    }

    public function getDeleteCart($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }
}
