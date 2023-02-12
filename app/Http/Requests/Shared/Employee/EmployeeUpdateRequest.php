<?php

namespace App\Http\Requests\Shared\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'avatar' => 'nullable|mimes:jpg,png,gif,bmp,webp|max:2000',
        ];
    }
}
