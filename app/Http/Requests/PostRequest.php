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
    public function authorize(){
        // return false; 
        return true;  // ← 認証されている場合許可
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'title' => 'required|max:22',
            'body' => 'max:1000',
            'is_public' => 'required|numeric',
            'published_at' => 'required|date_format:Y-m-d H:i',
            'tags.*' => 'numeric|exists:tags,id'
        ];
    }

    public function attributes(){
        return [
            'title' => 'タイトル',
            'body' => '内容',
            'is_public' => 'ステータス',
            'published_at' => '公開日',
            'tags.*' => 'タグ'
        ];
    }


}
