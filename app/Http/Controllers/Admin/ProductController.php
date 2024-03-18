<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getIndex()
    {
        $products = Product::all();

        return view('admin.pages.products.index' ,compact('products'));
    }

    public function getInfo(Product $product)
    {
        return view('admin.pages.products.templates.edit' ,compact('product'));
    }

    public function postIndex(ProductRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم اضافه المنتج بنجاح'];
    }

    public function postEdit(ProductRequest $request , Product $product)
    {
        $request->edit($product);

        return ['status' => 'success' ,'data' => 'تم تعديل بيانات المنتج بنجاح'];
    }

    public function getDelete(Product $product)
    {
        @unlink(storage_path('uploads/products').'/'.$product->image);

        $product->categories()->delete();

        $product->delete();

        return redirect()->back();
    }
}
