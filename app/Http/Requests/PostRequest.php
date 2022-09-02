<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            // 'title' => 'required|unique:movies,title'
            'title' => 'required',
            'image_url' => 'required|url',
            'published_year' => 'required|digits:4',
            'is_showing' => 'boolean',
            'description' => 'required',
        ];
    }

    // エラーメッセージ編集
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須入力項目です。',
            // 'title.unique' => 'このタイトルは既に登録されています。',
            'image_url.required' => '画像URLは必須入力項目です。',
            'image_url.url' => '正しい画像URLを入力してください。',
            'published_year.required' => '公開年は必須入力項目です。',
            'published_year.digits' => '公開年は4桁で入力してください。',
            'is_showing.boolean' => '公開中かどうかチェックしてください。',
            'description.required' => '概要は必須入力項目です。',
        ];
    }
}
