<?php
namespace App\Services;

use App\Models\Share;

class SharesService
{
    public function list()
    {
        return  Share::all()->sortByDesc('created_at');
    }

    /**
     * シェアハウスを登録するデータのまとめ
     *
     * @param $share
     * @param $request
     * @return void
     */

    public function sharesCreate($share, $request)
    {
        $share->fill($request->all());
        $share->admin_users_id = $request->user()->id;
    }
}
