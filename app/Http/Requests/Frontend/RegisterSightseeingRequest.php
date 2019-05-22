<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSightseeingRequest extends FormRequest
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
        $target = $this->get('target');
        if (!empty($target) && is_array($target)) {
            $target = array_filter($target);
        } else {
            $target = null;
        }

        $arr = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'business_id' => 'required',
            'number_people' => 'required|integer|min:1',
            //'target' => 'required|array',
            'from' => 'required',
            'to' => 'required',
            'country_id' => 'required',
            'country_other_id' => 'required_if:country_id,other',
            'content' => 'nullable|string|max:1024',
            'g-recaptcha-response' => 'required|captcha'
        ];

        if (empty($target)) {
            $arr['targets'] = 'required';
        } elseif ($target && in_array('TARGET_OTHER', $target)) {
            $arr['target_other'] = 'required';
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
