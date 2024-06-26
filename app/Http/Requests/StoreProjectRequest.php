<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['unique:projects', 'min:5'],
            'description' => ['nullable', 'min:10', 'max:5000'],
            'type_id' => ['nullable', 'exists:types,id'], //Controllo che esista la foreign key
            'image' => ['nullable'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }
}
