<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'is_admin' => 'required|in:0,1',
            'is_barber' => 'required|in:0,1',
            'active' => 'required|in:0,1',
            'new_password' => 'nullable|string|min:8',
            'note' => 'nullable',
            'photo' => 'nullable',
            'position' => 'required|numeric'
        ];
    }
}
