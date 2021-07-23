<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\ShareRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SharesController extends Controller
{
    /**
     * シェアハウスの投稿一覧の表示
     * @return Application|Factory|View
     */

    public function index() {
        $shares = Share::all()->sortByDesc('created_at');
        return view('shares.index', ['shares' => $shares]);
    }

    /**
     * 新規投稿フォームの表示
     * @return Application|Factory|View
     */
    public function create() {
        return view('shares.create');
    }

    /**
     * 投稿の登録
     * @param ShareRequest $request
     * @param Share $share
     * @return RedirectResponse
     */
    public function store(ShareRequest $request, Share $share)
    {
        $this->shares_create_colum($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    /**
     * 投稿編集フォームの表示
     * @param Share $share
     * @return Application|Factory|View
     */
    public function edit(Share $share)
    {
        return view('shares.edit', ['share' => $share]);
    }

    /**
     * 投稿の更新
     * @param ShareRequest $request
     * @param Share $share
     * @return RedirectResponse
     */
    public function update(ShareRequest $request, Share $share)
    {
        $this->shares_create_colum($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    /**
     * 投稿の削除
     * @param Share $share
     * @return RedirectResponse
     */
    public function destroy(Share $share)
    {
        $share->delete();
        return redirect()->route('admins.home');
    }

    /**
     * シェアハウスを登録するデータのまとめ
     * @param $share
     * @param $request
     * @return void
     */
    public function shares_create_colum($share, $request) {
        $share->fill($request->all());
        $share->admin_users_id = $request->user()->id;
    }
}
