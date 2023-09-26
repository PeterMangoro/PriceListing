<?php

namespace App\Http\Requests\Car\Insurance;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarInsuranceRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            
            'owner' => 'required',
            'contact' => 'nullable',
            'car_title' => 'nullable|string|max:255',
            'car_reg' => 'nullable|string|max:255',
            'payment' => 'nullable|string|max:255',
            'reg_date' => 'nullable|string|max:255',
            'reg_exp' => 'required|numeric|min:0',
            'user_id' => 'required_without:rent_status',
            

        ];
    }
}
