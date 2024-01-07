<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'icon' => 'required|min:1',
            'desc' => 'required|min:50',
            'active' => 'required|in:0,1',
            'position' => 'required|numeric',
        ];
    }
}
