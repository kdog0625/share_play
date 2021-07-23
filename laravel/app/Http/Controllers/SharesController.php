<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\ShareRequest;

class SharesController extends Controller
{
    //シェアハウス一覧
    public function index() {
        $shares = Share::all()->sortByDesc('created_at');
        return view('shares.index', ['shares' => $shares]);
    }

    public function create() {
        return view('shares.create');
    }

    public function store(ShareRequest $request, Share $share)
    {
        $this->shares_create_colum($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    public function edit(Share $share)
    {
        return view('shares.edit', ['share' => $share]);
    }

    public function update(ShareRequest $request, Share $share)
    {
        $this->shares_create_colum($share, $request);
        $share->save();
        return redirect()->route('admin.admin_home');
    }

    public function destroy(Share $share)
    {
        $share->delete();
        return redirect()->route('admins.home');
    }

    //シェアハウスを登録するデータのまとめ
    public function shares_create_colum($share, $request) {
        $share->fill($request->all());
        $share->admin_users_id = $request->user()->id;
    }
}
