<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required',
            'sale_status' => 'boolean',
            'date' => 'required_with:discount|after:now|nullable',
            'categories.*' => 'nullable|integer',

        ];
    }

    public function messages()
    {
        return [
            'date.after' => 'Please provide a future time',
            'title.required' => 'Please provide the name of the Service',
        ];
    }
}
