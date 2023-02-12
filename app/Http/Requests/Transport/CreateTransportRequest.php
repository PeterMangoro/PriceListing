<?php

namespace App\Http\Requests\Transport;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransportRequest extends FormRequest
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
            'car_id' => 'nullable|integer|min:1',
            'choice' => 'required|string',
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:5120',
            'images' => 'nullable',
            'car_make_id' => 'nullable|integer|min:1',
            'car_model_id' => 'nullable|integer|min:1',
            'detail' => 'required',
            'num_plate' => 'nullable',
            'departure' => 'required',
            'destination' => 'required',
            'price' => 'required|numeric|min:0',
            'passengers' => 'required|min:1',
            'date' => 'required|after:yesterday',
            'location' => 'nullable',
            'sale_status' => 'nullable',
            'rent_status' => 'nullable',

        ];
    }
}
