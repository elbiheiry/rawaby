<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'brief' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم الموقع',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'address.required' => 'برجاء ادخال العنوان',
            'email.required' => 'برجاء ادخال البريد الالكتروني الخاص بالموقع',
            'brief.required' => 'برجاء ادخال وصف مختصر للموقع'
        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->name = $this->name;
        $settings->phone = $this->phone;
        $settings->address = $this->address;
        $settings->email = $this->email;
        $settings->brief = $this->brief;
        $settings->facebook = $this->facebook;
        $settings->twitter = $this->twitter;
        $settings->youtube = $this->youtube;
        $settings->head = $this->head;
        $settings->packing = $this->packing;

        $settings->save();
    }
}
