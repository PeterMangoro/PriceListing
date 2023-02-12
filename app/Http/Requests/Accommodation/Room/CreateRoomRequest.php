<?php

namespace App\Http\Requests\Accommodation\Room;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
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
            'images.*' => 'required|mimes:png,jpg,gif,bmp,webp|max:5120',
            'images' => 'nullable',
            'detail' => 'required|string',
            'title' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }
}
