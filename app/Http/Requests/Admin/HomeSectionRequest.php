<?php

namespace App\Http\Requests\Admin;

use App\HomeSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class HomeSectionRequest extends FormRequest
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
        if($this->image){
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
        if($this->image){
            return[
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

    public function edit($id)
    {
        $section = HomeSection::find($id);

        $section->title = $this->title;
        $section->description = $this->description;

        $destination = storage_path('uploads/sections');

        $image = $this->image;
        if (!empty($image)) {
            @unlink($destination . "/{$section->image}");
            $section->image= md5(time()).'.'.$image->getClientOriginalName();
            $this->image->move($destination, $section->image);
            if ($id == '1'){
                Image::make($destination.'/'.$section->image)->resize(540,591)->save($destination.'/'.$section->image);
            }else{
                Image::make($destination.'/'.$section->image)->resize(645,448)->save($destination.'/'.$section->image);
            }
        }

        $section->save();
    }
}
