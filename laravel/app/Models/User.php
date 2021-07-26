<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /** 一般ユーザー登録及びログイン時のバリデーション */
    const NAME_RULE = 'required|max:20'; //名前
    const SHARE_USER_ID =
        'required|min:6|max:20|unique:users|unique:admin_users|regex:/^@[a-zA-Z0-9]+$/'; //ユーザー登録時に設定したID
    const EMAIL = 'required|email|max:255'; //メールアドレス
    const NAME_KANJI1 = 'required|max:20'; //氏名(性)
    const NAME_KANJI2 = 'required|max:20'; //氏名(名)
    const NAME_KANA1 = 'required|max:25'; //フリガナ(セイ)
    const NAME_KANA2 = 'required|max:25'; //フリガナ(メイ)
    const BIRTH_DAY = 'required|max:8'; //生年月日
    const AGE = 'required|integer'; //年齢
    const SEX = 'required'; //性別
    const AREA_COUNTRY = 'required'; //在住地域
    const PREFECTURE_NAME = 'required'; //都道府県名
    const TEL = 'required|max:12'; //電話番号
    const PASSWORD = 'required|min:8|confirmed'; //パスワード

    /**
     * @var string[]
     */
    protected $guarded = [
        'id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 一般ユーザー登録に対しるトランザクション処理
     *
     * @param $data
     * @return mixed
     */
    public function user($data)
    {
        try {
            DB::beginTransaction();

            $create = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'share_user_id' => $data['share_user_id'],
                'password' => Hash::make($data['password']),
                'name_kanji1' => $data['name_kanji1'],
                'name_kanji2' => $data['name_kanji2'],
                'name_kana1' => $data['name_kana1'],
                'name_kana2' => $data['name_kana2'],
                'birth_day' => $data['birth_day'],
                'age' => $data['age'],
                'sex' => $data['sex'],
                'area_country' => $data['area_country'],
                'prefecture_name' => $data['prefecture_name'],
                'tel' => $data['tel']
            ]);
            DB::commit();
            return $create;
        } catch (\Exception $e) {
            DB::rollBack();
            exit();
        }
    }
}
