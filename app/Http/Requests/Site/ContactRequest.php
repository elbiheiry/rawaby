<?php

namespace App\Http\Requests\Site;

use App\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسمك بالكامل',
            'phone.required' => 'برجاء ادخال رقم الجوال',
            'message.required' => 'برجاء ادخال رسالتك'
        ];
    }

    public function store()
    {
        $message = new Message();

        $message->name = $this->name;
        $message->phone = $this->phone;
        $message->message = $this->message;

        $message->save();
    }
}
