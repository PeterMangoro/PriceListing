<?php

namespace App\Http\Requests\Transport;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransportRequest extends FormRequest
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
            'car_id' => 'required|integer|min:1',
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:5120',
            'images' => 'nullable',
            'detail' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'price' => 'required|numeric|min:0',
            'passengers' => 'required|min:1',
            'date' => 'required|after:yesterday',

        ];
    }
}
