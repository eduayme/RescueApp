<?php

namespace App\Http\Requests\Incident;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date'                  => 'required',
            'images'                => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_creation_id'      => 'integer|required',
            'user_modification_id'  => 'integer|required',
            'search_id'             => 'required|integer',
        ];
    }

    /**
     * Validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.required'  => __('messages.required'),
            'date.required'         => __('messages.required'),
            'images'                => __('messages.mimes'),
            'images.size'           => __('messages.photo_max'),
        ];
    }
}
