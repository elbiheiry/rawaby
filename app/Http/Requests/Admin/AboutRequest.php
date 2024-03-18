<?php

namespace App\Http\Requests\Admin;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class AboutRequest extends FormRequest
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
        if ($this->image){
            return [
                'title' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000'
            ];
        }else{
            return [
                'title' => 'required',
                'description' => 'required'
            ];
        }

    }

    public function messages()
    {
        if ($this->image) {
            return [
                'title.required' => 'برجاء ادخال العنوان',
                'description.required' => 'برجاء ادخال المحتوي',
                'image.image' => 'برجاء استخدام صوره وليس ملف',
                'image.mimes' => ' نوع الصوره يجب ان يكون : jpeg,jpg,png,gif,svg',
                'image.max' => 'حجم الصوره يجب الا يزيد عن 2 ميجابايت',
            ];
        }else{
            return [
                'title.required' => 'برجاء ادخال العنوان',
                'description.required' => 'برجاء ادخال المحتوي'
            ];
        }
    }

    public function edit()
    {
        $about = About::first();

        $about->title = $this->title;
        $about->description = $this->description;

        $destination = storage_path('uploads/about');

        $image = $this->image;
        if (!empty($image)) {
            @unlink($destination . "/{$about->image}");
            $about->image= md5(time()).'.'.$image->getClientOriginalName();
            $this->image->move($destination, $about->image);
            Image::make($destination.'/'.$about->image)->resize(793,497)->save($destination.'/'.$about->image);
        }

        $about->save();
    }
}
