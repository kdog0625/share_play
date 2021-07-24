<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin_users';

    protected $guard = 'admin';

    /** 管理者登録及びログイン時のバリデーション */
    const NAME_RULE = 'required|max:20'; //名前
    const SHARE_USER_ID =
        'required|min:6|max:20|unique:users|unique:admin_users|regex:/^@[a-zA-Z0-9]+$/]'; //ユーザー登録時に設定したID
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

    protected $fillable = [
        'name',
        'share_user_id',
        'name_kanji1',
        'name_kanji2',
        'name_kana1',
        'name_kana2',
        'birth_day',
        'age',
        'sex',
        'area_country',
        'prefecture_name',
        'tel',
        'profile_image',
        'profile_text',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
