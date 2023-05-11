<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
                'name' => 'required|unique:types_ticket,name,' . $this->route()->parameter('type')->id
            ];
        }

        return [
            'name' => 'required|unique:types_ticket,name'
        ];
    }
}
