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
            'grad_id' => 'nullable|exists:grads,id',
            'contract_id' => 'nullable|exists:contract,id',
            'salary' => 'nullable|numeric',
            'employee_id' => 'required|string|unique:users,employee_id,' . $this->user,
        ];
    }
}
