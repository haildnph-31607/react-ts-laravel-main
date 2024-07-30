<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
         'name'=>['required'],
         'file' => ['image','mimes:jpg,jpeg,png','max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn phải điền name',
            'file.image' => 'Tệp phải là một ảnh.',
            'file.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'file.max' => 'Kích thước ảnh tối đa là 2 MB.',
           ];
    }
}
