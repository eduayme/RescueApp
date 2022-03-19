<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateRequest extends FormRequest
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
        $toBeValidated = [
            'is_active'         => ['numeric', Rule::in([0, 1])],
            'vehicle'           => ['string', 'max:50'],
            'broadcast'         => ['string', 'max:50'],
            'gps'               => ['string', 'max:50'],
            'people_involved'   => ['string', 'max:255'],
        ];


        if($this->request == 'POST') {
            $searchId = ['search_id' => ['required', 'numeric', 'exists:searches,id']];
            array_merge($toBeValidated, $searchId);
        }
        
        return $toBeValidated;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'vehicle.max'           => __('messages.max'),
            'broadcast.max'         => __('messages.max'),
            'gps.max'               => __('messages.max'),
            'people_involved.max'   => __('messages.max'),
        ];
    }
}
