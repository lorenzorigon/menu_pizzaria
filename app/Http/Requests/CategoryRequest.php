<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required',
            'image' => 'sometimes|file',
            'active' => 'required|boolean',
            'position' => 'required|integer',
            'size' => 'required|boolean',
            'size_m' => 'required_if:size,true',
            'size_g' => 'required_if:size,true',
            'size_gg' => 'required_if:size,true',
            'dimension_m' => 'required_if:size,true',
            'dimension_g' => 'required_if:size,true',
            'dimension_gg' => 'required_if:size,true',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'image.required' => 'A imagem é obrigatória.',
            'position.required' => 'A posição é obrigatória.'
        ];
    }
}
