<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareRequest extends FormRequest
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
            //バリデーションルールを定義
            'shara_name' => 'required',
            'prefecture_name' => 'required',
            'municipality_name' => 'required',
            'supplementary_address' => 'required',
            'share_picture' => 'required',
            'exchange_about' => 'required',
            'build_age' => 'required',
            'private_room' => 'required',
            'dormitory_room' => 'required',
            'access_about' => 'required',
            'friends_exchange' => 'required',
            'friend_desc' => 'required',
            'gender_ratio' => 'required',
            'jp_ov_ratio' => 'required',
            'age_ratio' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'shara_name' => 'シェアハウス名',
            'prefecture_name' => '都道府県',
            'municipality_name' => '市区町村',
            'supplementary_address' => '補足住所',
            'share_picture' => 'シェアハウス画像',
            'share_text' => 'シェアハウスの説明',
            'exchange_about' => '交流',
            'build_age' => '築年数',
            'private_room' => '個室',
            'dormitory_room' => 'ドミトリー',
            'access_about' => 'アクセス',
            'friends_exchange' => '友人の宿泊の有無',
            'friend-desc' => '友人の宿泊に対する条件',
            'gender_ratio' => '男女比',
            'jp_ov_ratio' => '日本人と外国人の比率',
            'age_ratio' => '年齢層の比率'
        ];
    }
}
