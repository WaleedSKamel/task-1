<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function onCreate()
    {
        return [
            'name' => ['required','string','min:2','max:255'],
            'email' => ['required','string','min:2','max:255','email',Rule::unique('users','email')],
            'brand_name' => ['required','string','min:2','max:255'],
            'upload' => ['required_if:show_input,1','mimes:pdf'],
        ];
    }

    protected function onUpdate()
    {
        return [
            'id' => ['required','integer',Rule::exists('users')],
            'name' => ['required','string','min:2','max:255'],
            'email' => ['required','string','min:2','max:255','email',Rule::unique('users','email')
            ->ignore($this->id,'id')],
            'brand_name' => ['required','string','min:2','max:255'],
            'upload' => ['sometimes','nullable','mimes:pdf'],
        ];
    }


    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }

    public function messages()
    {
        return [
          'required_if' => 'this upload filed is required when if you want upload CR',
        ];
    }
}
