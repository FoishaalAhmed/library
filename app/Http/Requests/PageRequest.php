<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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

            'priority' => 'required|numeric',
            'text'     => 'required|string',
            'photo'    => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [
                'name'     => 'required|string|max:255|unique:pages,name',
            ];

        } else {

            return $rules + [

                'name' => 'required|string|max:255|unique:pages,name,'.$this->page,
            ];
        }
    }
}
