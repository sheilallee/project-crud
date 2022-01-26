<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:250',
            'birth_date' => 'required|date',
            'address' => 'required|max:250',
            'email' => 'required|max:250',
            'phone' => 'regex:/\([0-9]{2}\)[0-9]{5}-[0-9]{4}/',
            'register_date' => 'required|date',
        ];

        return $rules;
    }


}
