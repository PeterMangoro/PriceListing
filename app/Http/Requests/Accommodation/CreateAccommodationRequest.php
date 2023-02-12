<?php

namespace App\Http\Requests\Mall\Accommodation;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccommodationRequest extends FormRequest
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
            'document_title' => 'nullable|required_with:document',
            'a_rooms' => 'required|integer|min:0',
            'detail' => 'required|string',
            'street' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
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
            'categories.required' => 'Please select the category of your accommodation',
            'images.*.type' => 'Image in position #:position must be an image',

        ];
    }
}
