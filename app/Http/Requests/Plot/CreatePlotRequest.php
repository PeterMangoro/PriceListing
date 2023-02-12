<?php

namespace App\Http\Requests\Plot;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlotRequest extends FormRequest
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
            'street' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'size' => 'required|numeric|min:0',
            'detail' => 'required',

            'price' => 'required|numeric|min:0',
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:5120',
            'images' => 'nullable',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx.rtf|max:5120',
            'document_title' => 'nullable|required_with:document',
        ];
    }
}
