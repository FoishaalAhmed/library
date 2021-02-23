<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
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

            'photo'    => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
            'bio'      => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'company'  => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter'  => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'priority' => 'required|numeric',
            'name'     => 'required|string|max:255',
        ];
    }
}
