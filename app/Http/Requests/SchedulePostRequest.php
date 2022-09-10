<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedulePostRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'movie_id' => 'required',
            'start_time_date' => 'required',
            'start_time_time' => 'required',
            'end_time_date' => 'required',
            'end_time_time' => 'required',
        ];
    }

    // エラーメッセージ編集
    public function messages()
    {
        return [
            'movie_id' => '必須項目です',
            'start_time_date' => '必須項目です',
            'start_time_time' => '必須項目です',
            'end_time_date' => '必須項目です',
            'end_time_time' => '必須項目です',
        ];
    }
}
