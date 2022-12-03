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
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'postcode' => 'required | max:8 | min:8',
            'address' => 'required',
            'opinion' => 'required | max:120'
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '苗字を入力してください',
            'first_name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.max' => '3桁-(ハイフン)4桁の形式で入力してください',
            'postcode.min' => '3桁-(ハイフン)4桁の形式で入力してください',
            'address.required' => 'ご住所を入力してください',
            'opinion.required' => 'ご意見を入力してください'
        ];
    }
}
