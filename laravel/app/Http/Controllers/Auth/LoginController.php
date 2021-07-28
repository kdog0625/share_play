<?php
/**
 * 一般ユーザー用のログインコントローラー
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
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
     * リダイレクト先をトップページに設定
     * @var string リダイレクト先
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
