<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:2040',
            'images' => 'required',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx.rtf|max:5120',
            'document_title' => 'nullable|required_with:document',
            'title' => 'required|max:255',
            'detail' => 'required|string',
            'price' => 'required|numeric|min:0',
            'categories.*' => 'required|integer',
            'categories' => 'required', #validate if array exists

        ];
    }

    public function messages()
    {
        return [
            'document.required_with' => 'Please provide the Document',
            'document_title.required_with' => 'Please provide the Document',
            'title.required' => 'Please provide the name of the Product',
            'categories.required' => 'Please select the category of your product',
            'images.*.type' => 'Image in position #:position must be an image',

        ];
    }
}
