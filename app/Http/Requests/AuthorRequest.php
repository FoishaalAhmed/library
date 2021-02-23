<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //exit($this->author);
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

            'photo'      => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
            'biography'  => 'nullable|string',
            'birth_date' => 'nullable|date',
            'death_date' => 'nullable|date',
            'genres'     => 'nullable|array',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [

                'name' => 'required|string|max:255|unique:authors,name',

            ];

        } else {

            return $rules + [

                'name' => 'required|string|max:255|unique:authors,name,'.$this->author,

            ];
        }
    }
}
