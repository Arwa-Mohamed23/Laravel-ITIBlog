<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required','min:3','unique:posts'],
            'description' => ['required', 'min:10'],
            'post_creator' => ['required', 'exists:users,id'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
        ];
    }
}
