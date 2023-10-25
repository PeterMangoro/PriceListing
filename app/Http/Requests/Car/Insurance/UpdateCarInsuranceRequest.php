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
            
            'owner' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'car_title' => 'required|string|max:255',
            'car_reg' => 'required|string|max:255',
            // 'payment' => 'required|array',
            // 'reg_date' => 'required|string|max:255',
            'reg_exp' => 'required|string|max:255',            
            'car_insurance' => 'required_without:zimra',
            'zimra' => 'required_without:car_insurance',
            

        ];
    }
}
