<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RfpRequest extends FormRequest
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
            'file_name'=>'mimes:doc,docx,pdf,zip',
            'first_name' => 'required|min:1|max:80',
            'last_name' => 'required|min:1|max:80',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'requirement_detail'=>'required'
        ];
    }

}
