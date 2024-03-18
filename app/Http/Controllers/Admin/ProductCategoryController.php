<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductCategoryRequest;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    //
    public function getIndex($id)
    {
        $categories = ProductCategory::where('product_id' , $id)->get();

        return view('admin.pages.products.categories.index' ,compact('categories' ,'id'));
    }

    public function getInfo($id)
    {
        $category = ProductCategory::find($id);

        return view('admin.pages.products.categories.templates.edit' ,compact('category'));
    }

    public function postIndex(ProductCategoryRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه الحجم بنجاح'];
    }

    public function postEdit(ProductCategoryRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل الحجم بنجاح'];
    }

    public function getDelete($id)
    {
        $category = ProductCategory::find($id);

        $category->delete();

        return redirect()->back();
    }
}
