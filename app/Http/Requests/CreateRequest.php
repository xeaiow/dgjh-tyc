<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'class_id'      =>  'required',
            'numbers'       =>  'required|numeric',
            'firstname'     =>  'required',
            'birthday'      =>  'required',
            'identity_id'   =>  'required|unique:member,identity_id',
            'guardian'      =>  'required',
        ];
    }


    public function attributes()
    {
        return [
            'class_id'      =>  '班級',
            'numbers'       =>  '座號',
            'firstname'     =>  '姓名',
            'birthday'      =>  '生日',
            'identity_id'   =>  '身分證字號',
            'guardian'      =>  '監護人',
        ];
    }


    public function messages()
    {
        return [
            'class_id.required'      =>  '班級未填寫',
            'numbers.required'       =>  '座號未填寫',
            'firstname.required'     =>  '姓名未填寫',
            'birthday.required'      =>  '生日未填寫',
            'identity_id.required'   =>  '身分證字號未填寫',
            'identity_id.unique'     =>  '身份證字號已存在',
            'guardian.required'      =>  '監護人未填寫',
        ];
    }


    public function response (array $errors)
    {
        return back()->withErrors($errors)->withInput();
    }
}
