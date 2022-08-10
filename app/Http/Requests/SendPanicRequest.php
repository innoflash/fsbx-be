<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendPanicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'latitude' => [
                'required',
                'numeric',
                $this->locationValidator()
            ],
            'longitude' => [
                'required',
                'numeric',
                $this->locationValidator()
            ],
            'panic_type' => 'string|min:2',
            'details' => 'string|min:2'
        ];
    }

    private function locationValidator(): callable
    {
        return function ($attribute, $value, $fail) {
            $valid = preg_match('^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$', $value);

            if (!$valid) {
                $fail('The ' . $attribute . ' is not a valid location attribute');
            }
        };
    }
}
