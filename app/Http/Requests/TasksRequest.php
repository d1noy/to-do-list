<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required',
        ];
    }
}
