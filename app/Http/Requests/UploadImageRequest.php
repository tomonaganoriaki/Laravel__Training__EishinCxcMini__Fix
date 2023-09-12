<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'files.*.image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'image.file' => '画像を選択してください',
            'image.image' => '画像を選択してください',
            'image.mimes' => '画像を選択してください',
            'image.max' => '2MB以下の画像を選択してください',
        ];
    }
}
