<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAttendRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'      => 'required',
            'start'      => 'required',
            'end'        => 'required',
        ];
    }


    public function attributes()
    {
        return [
            'title'      => '標題',
            'start'      => '開始時間',
            'end'        => '結束時間',
        ];
    }


    public function messages()
    {
        return [
            'title.required'    => '標題未填寫',
            'start.required'    => '開始時間未填寫',
            'end.required'      => '結束時間未填寫'
        ];
    }


    public function response (array $errors)
    {
        return back()->withErrors($errors)->withInput();
    }
}
