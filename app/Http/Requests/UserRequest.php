<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => $this->isMethod('post') ? 'required|min:6' : 'nullable|min:6',
            'departement_id' => 'nullable|exists:departements,id',
            'role_id' => 'nullable|exists:roles,id',
            'contract_id' => 'nullable|exists:contract,id', 
            'salary' => 'nullable|numeric|min:3000',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'status' => 'nullable|in:engaged,divorced',
            'assurance' => 'nullable|in:yes,no',
            'CIN' => 'nullable|string|max:255',
            'CNSS' => 'nullable|integer',
          
            'career_id' => 'required|exists:career,id',
            'formations' => 'nullable|array',
            'formations.*' => 'exists:formation,id',
        ];
    }
}
