<?php
/**
 * 管理者用のユーザー登録コントローラー
 */
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Admin\Auth
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
     * リダイレクト先を管理者のトップページに設定
     * @var string リダイレクト先
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 管理者登録に対するバリデーション
     *
     * @param  array  $data 管理者登録するデータ
     * @return \Illuminate\Contracts\Validation\Validator バリデーション
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
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
     * @param  array $data 管理者登録情報
     * @return void 新規管理者情報
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();
            $create = AdminUser::create([
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
            DB::commit();
            return $create;
        } catch (\Exception $e) {
            DB::rollBack();
            exit();
        }
    }

    /**
     * 管理者登録のページを表示
     * @return Application|Factory|View ビュー
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    /**
     * 管理者の認証設定
     * @return Guard|StatefulGuard 管理者
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
