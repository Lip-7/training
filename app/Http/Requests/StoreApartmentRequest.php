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
            'name' => ['required', 'max:255', Rule::unique('apartments')->ignore($this->apartment)],
            'slug' => 'nullable',
            'rooms' => 'required|integer|min:1',
            'beds' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'mq' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'photo' => ['required', 'string'],
            'lat' => 'required|numeric|between:-90.00000000,90.00000000',
            'lon' => 'required|numeric|between:-180.00000000,180.00000000',
            'visible' => 'required|boolean',
            /* 'user_id' => ['required', 'exists:users,id'] */
        ];
    }
}
