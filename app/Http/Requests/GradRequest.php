<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'grad_name' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'company_name' => 'required|string|max:255',
        ];
    }
}
