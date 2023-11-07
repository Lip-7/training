<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'apartment_id' => ['required', 'exists:apartments,id'],
            'name' => ['required','string','min:1','max:255'],
            'lastname' => ['required','string','min:1','max:255'],
            'email' => ['required','string', 'email','max:255'],
            'text' => ['required','string','min:1'],
        ];
    }
}
