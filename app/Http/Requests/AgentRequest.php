<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'age' => [
                'required',
                'integer',
                'min:0',
                'max:255',
            ],
            'gender' => [
                'required',
                Rule::in(['MALE', 'FEMALE']),
            ],
            'address' => [
                'nullable',
                'string',
                'max:255',
            ],
            'nationality' => [
                'nullable',
                'string',
                'max:255',
            ],
            'passport_id' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('agents')->ignore($this->agent),
            ],
            'notes' => [
                'nullable',
                'string',
            ],
        ];
    }
}
