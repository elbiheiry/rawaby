<?php

namespace App\Http\Requests\Admin;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => implode("<br>" , $validator->errors()->all())];

        throw new HttpResponseException(response()->json($result , 200));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (\Request::route()->getName() == 'admin.products'){
            return [
                'name' => 'required',
                'image' => 'required|image|max:2000|mimes:jpeg,jpg,png,gif,svg',
                'cutting' => 'required'
            ];
        }else{
            return [
                'name' => 'required',
                'image' => 'image|max:2000|mimes:jpeg,jpg,png,gif,svg',
                'cutting' => 'required'
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.products'){
            return [
                'name.required' => 'برجاء ادخال الاسم',
            
                'image.required' => 'برجاء رفع صوره',
                'image.image' => 'يجب اختيار صوره وليس ملف',
                'image.mimes' => ' نوع الصوره يجب ان يكون : jpeg,jpg,png,gif,svg',
                'image.max' => 'حجم الصوره يجب الا يزيد عن 2 ميجابايت',
                'cutting.required' => 'برجاء اختيار طرق التقطيع المفضله'
            ];
        }else{
            return [
                'name.required' => 'برجاء ادخال الاسم',
                    'image.image' => 'يجب اختيار صوره وليس ملف',
                'image.mimes' => ' نوع الصوره يجب ان يكون : jpeg,jpg,png,gif,svg',
                'image.max' => 'حجم الصوره يجب الا يزيد عن 2 ميجابايت',
                'cutting.required' => 'برجاء اختيار طرق التقطيع المفضله'
            ];
        }
    }

    public function store()
    {
        $product = new Product();

        $product->name = $this->name;
        $product->slug = str_slug($this->name);
        $product->cutting = implode(',', $this->cutting);
        $product->active = $this->active;

        if (!empty($this->image)) {
//            @unlink(storage_path('uploads/article') . "/{$article->image}");
            $product->image= md5(time()).'.'.$this->image->getClientOriginalName();
            $this->image->move(storage_path('uploads/products'), $product->image);
            Image::make(storage_path('uploads/products').'/'.$product->image)->resize(490,370)->save(storage_path('uploads/products').'/'.$product->image);
        }

        $product->save();
    }

    public function edit($product)
    {
        $product->name = $this->name;
        $product->cutting = implode(',', $this->cutting);
        $product->active = $this->active;

        if (!empty($this->image)) {
            @unlink(storage_path('uploads/products') . "/{$product->image}");
            $product->image= md5(time()).'.'.$this->image->getClientOriginalName();
            $this->image->move(storage_path('uploads/products'), $product->image);
            Image::make(storage_path('uploads/products').'/'.$product->image)->resize(490,370)->save(storage_path('uploads/products').'/'.$product->image);
        }

        $product->save();
    }
}
