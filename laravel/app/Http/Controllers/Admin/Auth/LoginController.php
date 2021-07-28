<?php
/**
 * 管理者用のログインコントローラー
 */
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Admin\Auth
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
     * リダイレクト先を管理者のトップページに設定
     * @var string リダイレクト先
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * 管理者のログインページにリダイレクトさせる
     *
     * @return Application|Factory|View ビュー
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * 管理者の設定
     * @return Guard|StatefulGuard 管理者
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * 管理者ログアウト
     *
     * @param Request $request リクエスト
     * @return Application|RedirectResponse|Redirector リダイレクト
     */
    protected function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}
