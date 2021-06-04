<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'last_name' => 'sometimes|string',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'position_id' => 'required|numeric'
        ];
    }
}
