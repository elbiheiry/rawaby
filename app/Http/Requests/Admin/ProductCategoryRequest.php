<?php

namespace App\Http\Requests\Admin;

use App\ProductCategory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCategoryRequest extends FormRequest
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
        return [
            'name' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال الحجم',
            'price.required' => 'برجاء ادخال السعر'
        ];
    }

    public function store($id)
    {
        $category = new ProductCategory();

        $category->price = $this->price;
        $category->name = $this->name;
        $category->product_id = $id;

        $category->save();
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);

        $category->price = $this->price;
        $category->name = $this->name;

        $category->save();
    }
}
