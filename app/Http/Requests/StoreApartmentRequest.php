<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApartmentRequest extends FormRequest
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
            'name' => ['required', 'max:150', Rule::unique('apartments')],
            'rooms' => 'nullable',
            'beds' => 'nullable',
            'bathrooms' => 'nullable',
            'mq' => 'nullable',
            'address' => 'nullable',
            'photo' => 'nullable',
            'lat' => 'nullable',
            'lon' => 'nullable',
            'visible' => 'nullable',
            'user_id' => ['nullable', 'exists:users,id']
        ];
    }
}
