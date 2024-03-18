<?php

namespace App\Http\Requests\Admin;

use App\Testimonial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonialRequest extends FormRequest
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
            'description' => 'required',
            'location' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم العميل',
            'description.required' => 'برجاء ادخال راي العميل',
            'location.required' => 'برجاء ادخال عنوان العميل'
        ];
    }

    public function store()
    {
        $member = new Testimonial();

        $member->name = $this->name;
        $member->description = $this->description;
        $member->location = $this->location;

        $member->save();
    }

    public function edit($id)
    {
        $member = Testimonial::find($id);

        $member->name = $this->name;
        $member->description = $this->description;
        $member->location = $this->location;

        $member->save();
    }
}
