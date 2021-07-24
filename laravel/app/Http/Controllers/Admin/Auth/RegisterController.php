<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;

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
     * requestバリデーション
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => AdminUser::NAME_RULE,
            'share_user_id' => AdminUser::SHARE_USER_ID,
            'email' => AdminUser::EMAIL,
            'name_kanji1' => AdminUser::NAME_KANJI1,
            'name_kanji2' => AdminUser::NAME_KANJI2,
            'name_kana1' => AdminUser::NAME_KANA1,
            'name_kana2' => AdminUser::NAME_KANA2,
            'birth_day' => AdminUser::BIRTH_DAY,
            'age' => AdminUser::AGE,
            'sex' => AdminUser::SEX,
            'area_country' => AdminUser::AREA_COUNTRY,
            'prefecture_name' => AdminUser::PREFECTURE_NAME,
            'tel' => AdminUser::TEL,
            'password' => AdminUser::PASSWORD,
        ]);
    }

    /**
     * 管理者登録
     *
     * @param  array  $data
     * @return AdminUser
     */
    protected function create(array $data)
    {
        return AdminUser::create([
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
            'tel' => $data['tel'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
