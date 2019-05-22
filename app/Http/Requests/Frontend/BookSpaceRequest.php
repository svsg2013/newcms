<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class BookSpaceRequest extends FormRequest
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
        $free_space = $this->get('free_space_id');
        if (!empty($free_space) && is_array($free_space)) {
            $free_space = array_filter($free_space);
        } else {
            $free_space = null;
        }

        $arr = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'business_id' => 'required',
            'target_id' => 'required_without:target_other',
            'country_id' => 'required',
            'country_other_id' => 'required_if:country_id,other',
            'content' => 'nullable|string|max:1024',
            'g-recaptcha-response' => 'required|captcha'
        ];
        if (empty($free_space)) {
            $arr['free_space'] = 'required';
        }
        return $arr;
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.*' => trans('validation.recaptcha')
        ];
    }
}
