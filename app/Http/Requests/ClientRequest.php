<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name1' => 'required',
            'name2' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|min:8|max:8',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'name1.required' => '名字を入力してください',
            'name2.required' => '名前を入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.min' => '郵便番号はハイフン込みの8桁で入力してください',
            'postcode.max' => '郵便番号はハイフン込みの8桁で入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => 'ご意見は120字以内でご記入ください'
        ];
    }

    protected function getRedirectUrl()
    {
        return 'verror';
    }
}
