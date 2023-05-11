<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
                'slide' => 'nullable|image'
            ];
        }

        return [
            'slide' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'image' => 'Sai định dạng hình ảnh'
        ];
    }

    public function attributes()
    {
        return [
            'slide' => 'Ảnh'
        ];
    }
}
