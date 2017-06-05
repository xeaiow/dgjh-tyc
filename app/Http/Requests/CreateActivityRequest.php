<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'         => 'required',
            'location'      => 'required',
            'joined'        => 'required',
            'activity_date' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title'          => '活動名稱',
            'location'       => '活動地點',
            'joined'         => '參加人數',
            'activity_date'  => '活動時間',
        ];
    }


    public function messages()
    {
        return [
            'title.required'            => '活動名稱未填寫',
            'location.required'         => '活動地點未填寫',
            'joined.required'           => '參加人數位填寫',
            'activity_date.required'    => '活動時間未填寫',
        ];
    }


    public function response (array $errors)
    {
        return back()->withErrors($errors)->withInput();
    }
}
