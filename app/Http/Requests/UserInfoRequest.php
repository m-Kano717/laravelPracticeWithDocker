<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            "first_name" => "required|max:20",
            "last_name" => "required|max:20",
            "pass" => "required",
            "nick_name" => "required|max:50",
            "address1" => "required",
            "address2" => ["required", "max:20", "regex:/^[ぁ-んァ-ヶー一-龠]{2,8}$/u", "regex:/[市区町村]$/u"],
            "address3" => "required|max:100",
            "address4" => "required|max:100",
            "birth_date" => "required|date|before_or_equal:today",
            "sex" => "required",
            "mail"=> "max:100",
            "tel" => ["required", "max:20", "regex:/^0\d{9,10}$/"],
            "user_type" => "required"
        ];
    }

    public function messages(): array {
        return [
            // 姓 (first_name)
            'first_name.required' => '姓を入力してください。',
            'first_name.max'      => '姓は20文字以内で入力してください。',

            // 名 (last_name)
            'last_name.required'  => '名を入力してください。',
            'last_name.max'       => '名は20文字以内で入力してください。',

            // パスワード (pass)
            'pass.required'       => 'パスワードを入力してください。',

            // ニックネーム (nick_name)
            'nick_name.required'  => 'ニックネームを入力してください。',
            'nick_name.max'       => 'ニックネームは50文字以内で入力してください。',

            // 都道府県 (address1)
            'address1.required'   => '都道府県を選択してください。',

            // 市区町村 (address2)
            'address2.required'   => '市区町村を入力してください。',
            'address2.max'        => '市区町村は20文字以内で入力してください。',
            'address2.regex'      => '市区町村は全角日本語（2〜8文字）で入力し、最後は「市」「区」「町」「村」のいずれかで終わるようにしてください。',

            // 番地 (address3)
            'address3.required'   => '番地を入力してください。',
            'address3.max'        => '番地は100文字以内で入力してください。',

            // 建物名・部屋番号 (address4)
            'address4.required'   => '建物名・部屋番号を入力してください。',
            'address4.max'        => '建物名・部屋番号は100文字以内で入力してください。',

            // 生年月日 (birth_date)
            'birth_date.required' => '生年月日を入力してください。',
            'birth_date.date'     => '正しい日付を入力してください。',
            'birth_date.before_or_equal' => '生年月日に明日以降の日付を指定することはできません。',

            // 性別 (sex)
            'sex.required'        => '性別を選択してください。',

            // 電話番号 (tel)
            'tel.required'        => '電話番号を入力してください。',
            'tel.max'             => '電話番号は20文字以内で入力してください。',
            'tel.regex'           => '電話番号は、0から始まるハイフンなしの数字（10桁または11桁）で入力してください。',

            // 会員種別 (user_type)
            'user_type.required'  => '会員種別を選択してください。',
        ];
    }
}
