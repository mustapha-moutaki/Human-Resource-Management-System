<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions,name,' . $this->route('permission'), // Ensures unique validation while updating
        ];
    }

   
   public function messages()
   {
       return [
           'name.required' => 'Permission name is required.',
           'name.unique' => 'Permission name must be unique.',
       ];
   }
}
