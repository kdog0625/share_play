<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * 管理者のログインページにリダイレクトさせる
     *
     * @return Application
     * @override \Illuminate\Http\Foundation\Auth\AuthenticatesUsers
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // 管理者設定
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * ユーザーをログアウトさせる
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @override \Illuminate\Http\Foundation\Auth\AuthenticatesUsers
     */
    protected function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}
