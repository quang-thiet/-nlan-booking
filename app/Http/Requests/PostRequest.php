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
        if (request()->method() == 'PUT') {
            return [
                'title' => 'required',
                'thumbnail' => 'nullable|image',
                'description' => 'required',
                'content' => 'required'
            ];
        }

        return [
            'title' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'image' => 'Sai định dạng hình ảnh '
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'thumbnail' => 'Ảnh đại diện',
            'description' => 'Mô tả ngắn',
            'content' => 'Nội dung'
        ];
    }
}
