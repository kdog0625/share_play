<?php
/**
 * シェアコントローラー
 */
namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\ShareRequest;
use App\Services\SharesService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class SharesController
 * @package App\Http\Controllers
 */
class SharesController extends Controller
{
    /**
     * @var SharesService
     */
    private $sharesService;

    public function __construct(SharesService $sharesService)
    {
        $this->sharesService = $sharesService;
    }

    /**
     * シェアハウスの投稿一覧の表示
     * @return Application|Factory|View ビュー
     */

    public function index()
    {
        $shares = $this->sharesService->list();
        return view('shares.index', ['shares' => $shares]);
    }

    /**
     * 新規投稿フォームの表示
     * @return Application|Factory|View ビュー
     */
    public function create()
    {
        return view('shares.create');
    }

    /**
     * シェアハウス投稿の登録
     *
     * @param ShareRequest $request リクエスト
     * @param Share $share シェアモデル
     * @return RedirectResponse リダイレクト
     */
    public function store(ShareRequest $request, Share $share): RedirectResponse
    {
        $this->sharesService->sharesCreate($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    /**
     * シェアハウス投稿編集フォームの表示
     *
     * @param Share $share シェアモデル
     * @return Application|Factory|View ビュー
     */
    public function edit(Share $share)
    {
        return view('shares.edit', ['share' => $share]);
    }

    /**
     * シェアハウス投稿の更新
     *
     * @param ShareRequest $request リクエスト
     * @param Share $share シェアモデル
     * @return RedirectResponse リダイレクト
     */
    public function update(ShareRequest $request, Share $share): RedirectResponse
    {
        $this->sharesService->sharesCreate($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    /**
     * シェアハウス投稿の削除
     *
     * @param Share $share シェアモデル
     * @return RedirectResponse リダイレクト
     */
    public function destroy(Share $share): RedirectResponse
    {
        $share->delete();
        return redirect()->route('admins.home');
    }
}
