<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function getIndex()
    {
        $products = Product::where('active' , 1)->get();

        return view('site.pages.orders.index' ,compact('products'));
    }

    public function getSingleOrder(Product $product)
    {
        return view('site.pages.orders.single' ,compact('product'));
    }
}
