<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'nullable|email|max:255|unique:users,email,',
            'dob' => 'nullable|date|before:today',
            'address' => 'nullable|string|min:6|max:100',
            'phone' => 'nullable|numeric|digits_between:10,15|unique:users,phone,',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ];
    }
}
