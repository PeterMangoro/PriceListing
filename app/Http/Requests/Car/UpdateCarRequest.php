<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:5120',
            'images' => 'nullable',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx.rtf|max:5120',
            'document_title' => 'nullable|required_with:document',
            'car_make_id' => 'required|integer|min:1',
            'car_model_id' => 'required|integer|min:1',
            'detail' => 'required',
            'num_plate' => 'nullable',
            'street' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_status' => 'required_without:rent_status',
            'rent_status' => 'required_without:sale_status',
            'categories.*' => 'nullable|integer',

        ];
    }
}
