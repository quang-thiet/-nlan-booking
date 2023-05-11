<?php

namespace App\Http\Requests;

use App\Rules\CheckTypeExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketRequest extends FormRequest
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
                'name' => 'required',
                'description' => 'required',
                'content' => 'required',
                'times' => 'required|array|min:1',
                'types' => [
                    new CheckTypeExists,
                    'array',
                    'min:1'
                ],
                'thumbnail' => 'nullable|image',
                'category_id' => 'required'
            ];
        }

        return [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'times' => 'required|array|min:1',
            'types' => [
                new CheckTypeExists,
                'array',
                'min:1'
            ],
            'thumbnail' => 'required|image',
            'category_id' => 'required'
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
            'name' => 'Tên vé',
            'description' => 'Mô tả ngắn',
            'content' => 'Nội dung',
            'thumbnail' => 'Ảnh đại diện',
            'times' => 'Khung giờ chiếu',
            'types' => 'Giá loại vé',
            'category_id' => 'Danh mục vé'
        ];
    }
}
