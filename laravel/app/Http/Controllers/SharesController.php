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
        $share->admin_users_id = $request->user()->id;
        $share->shara_name = $request->shara_name;
        $share->prefecture_name = $request->prefecture_name;
        $share->municipality_name = $request->municipality_name;
        $share->supplementary_address = $request->supplementary_address;
        $share->share_picture = $request->share_picture;
        $share->share_text = $request->share_text;
        $share->exchange_about = $request->exchange_about;
        $share->build_age = $request->build_age;
        $share->private_room = $request->private_room;
        $share->dormitory_room = $request->dormitory_room;
        $share->access_about = $request->access_about;
        $share->friends_exchange = $request->friends_exchange;
        $share->friend_desc = $request->friend_desc;
        $share->gender_ratio = $request->gender_ratio;
        $share->jp_ov_ratio = $request->jp_ov_ratio;
        $share->age_ratio = $request->age_ratio;
    }
}
