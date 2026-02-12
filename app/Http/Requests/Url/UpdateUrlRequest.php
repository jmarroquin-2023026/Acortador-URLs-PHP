<?php

namespace App\Http\Requests\Url;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUrlRequest extends FormRequest
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
            'original_url' => [
                'required',
                'url',
                Rule::unique('urls', 'original_url')->ignore(
                    $this->route('id')
                ),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'original_url.required' => 'La URL es obligatoria',
            'original_url.url' => 'Debe ingresar una URL válida',
            'original_url.unique' => 'Esta URL ya está registrada',
        ];
    }
}
