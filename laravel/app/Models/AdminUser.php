<?php
/**
 * 管理者モデル
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminUser
 * @package App\Models
 */
class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var string admin_usersテーブル
     */
    protected $table = 'admin_users';

    /**
     * @var string 管理者に対してアクセス許可をする
     */
    protected $guard = 'admin';

    /** 管理者登録及びログイン時のバリデーション */
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
     * idに対して代入を不可とする。
     * @var string[] id
     */
    protected $guarded = [
        'id'
    ];

    /**
     * モデルを配列/JSON変換する際、表示させたくないカラムを指定
     * @var string[] password, remember_token
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * データを自動変換
     * @var string[] email_verified_at
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
