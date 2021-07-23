<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::Admin;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //バリデーションルールを定義
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'share_user_id' => ['required', 'string',
                'min:6', 'max:20', 'unique:users', 'unique:admin_users', 'regex:/^@[a-zA-Z0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name_kanji1' => ['required', 'string', 'max:20'],
            'name_kanji2' => ['required', 'string', 'max:20'],
            'name_kana1' => ['required', 'string', 'max:25'],
            'name_kana2' => ['required', 'string', 'max:25'],
            'birth_day' => ['required', 'string', 'max:8'],
            'age' => ['required', 'integer'],
            'sex' => ['required', 'string'],
            'area_country' => ['required', 'string'],
            'prefecture_name' => ['required', 'string'],
            'tel' => ['required', 'string', 'max:12'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
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
