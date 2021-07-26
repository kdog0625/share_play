<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 一般ユーザー登録に対するバリデーション
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => User::NAME_RULE,
            'share_user_id' => User::SHARE_USER_ID,
            'email' => User::EMAIL,
            'name_kanji1' => User::NAME_KANJI1,
            'name_kanji2' => User::NAME_KANJI2,
            'name_kana1' => User::NAME_KANA1,
            'name_kana2' => User::NAME_KANA2,
            'birth_day' => User::BIRTH_DAY,
            'age' => User::AGE,
            'sex' => User::SEX,
            'area_country' => User::AREA_COUNTRY,
            'prefecture_name' => User::PREFECTURE_NAME,
            'tel' => User::TEL,
            'password' => User::PASSWORD,
        ]);
    }

    /**
     * 一般ユーザー登録
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data): User
    {
        {
            return (new User())->user($data);
        }
    }
}
