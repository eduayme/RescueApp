<?php

namespace App\Http\Requests\Incident;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'description'           => 'required',
            'date'                  => 'required|date',
            'user_modification_id'  => 'integer|sometimes',
            'images_delete'         => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Validation messages
     * @return array
     */
    public function messages()
    {
        return [
            'description.required'          => __('messages.required'),
            'date.required'                 => __('messages.required'),
            'images_delete.mimes'           => __('messages.mimes'),
            'images_delete.size'            => __('messages.photo_max'),
        ];
    }
}
