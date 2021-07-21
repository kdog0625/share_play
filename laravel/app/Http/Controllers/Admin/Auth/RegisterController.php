<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin_User;
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Admin_User
     */
    protected function create(array $data)
    {
        return Admin_User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'share_admin_id' => $data['share_admin_id'],
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

    protected function guard(){
        return Auth::guard('admin');
    }
}
