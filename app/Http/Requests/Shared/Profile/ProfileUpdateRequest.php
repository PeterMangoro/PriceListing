<?php

namespace App\Http\Requests\Shared\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'mission' => 'nullable|string|max:255',
            'vision' => 'nullable|string|max:255',
            'history' => 'nullable|string',
            'values' => 'nullable|string',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx|max:5120',
            'document_title' => 'nullable|required_with:document',
            'street' => 'required_with:city|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'required_with:street|string|max:255',
            'country' => 'nullable|string|max:255',

        ];
    }
}
