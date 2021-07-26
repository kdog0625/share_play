<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ShareRequest
 * @package App\Http\Requests
 */
class ShareRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * シェアハウス登録に対するバリデーションの定義
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //バリデーションルールを定義
            'shara_name' => 'required|max:50',
            'prefecture_name' => 'required|max:20',
            'municipality_name' => 'required|max:20',
            'supplementary_address' => 'required|max:50',
            'share_picture' => 'required',
            'share_text' => 'required|max:1024',
            'exchange_about' => 'required',
            'build_age' => 'required',
            'private_room' => 'required',
            'dormitory_room' => 'required',
            'access_about' => 'required|max:255',
            'friends_exchange' => 'required',
            'friend_desc' => 'max:255',
            'gender_ratio' => 'required',
            'jp_ov_ratio' => 'required',
            'age_ratio' => 'required',
        ];
    }

    /**
     * バリデーションの際のエラーメッセージの日本語化
     * @return string[]
     */
    public function attributes(): array
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
            'friend_desc' => '友人の宿泊に対する条件',
            'gender_ratio' => '男女比',
            'jp_ov_ratio' => '日本人と外国人の比率',
            'age_ratio' => '年齢層の比率'
        ];
    }
}
