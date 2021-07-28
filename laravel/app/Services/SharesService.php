<?php
namespace App\Services;

use App\Models\Share;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SharesService
 * @package App\Services
 */
class SharesService
{
    /**
     * 登録されたシェアハウスの全情報を取得
     *
     * @return Share[]|Collection
     */
    public function list()
    {
        return Share::all()->sortByDesc('created_at');
    }

    /**
     * シェアハウスの登録、更新に対するデータのまとめ
     *
     * @param $share
     * @param $request
     * @return void
     */
    public function sharesCreate($share, $request)
    {
        return (new Share())->share($share, $request);
    }
}
