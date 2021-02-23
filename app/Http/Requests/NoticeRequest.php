<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->notice);
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

            'date'        => 'required|date',
            'title'       => 'required|string|max:255',
            'document'    => 'mimes:jpeg,jpg,png,gif,webp,pdf|max:99999|nullable',
            'description' => 'required|string',
            
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [

                'slug'     => 'required|string|max:300|unique:notices,slug',
            ];

        } else {

            //exit('PUT');

            return $rules + [

                'slug' => 'required|string|max:300|unique:notices,slug,'.$this->notice,
            ];
        }
    }
}
