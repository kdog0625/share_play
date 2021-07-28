<?php
/**
 * シェアハウスモデル
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * Class Share
 * @package App\Models
 */
class Share extends Model
{
    use HasFactory;

    /**
     * idに対して代入を不可とする。
     * @var array id
     */
    protected $guarded = [
        'id'
    ];

    /**
     * 管理者情報を取得
     *
     * @return BelongsTo
     */
    public function adminUser(): BelongsTo
    {
        return $this->belongsTo('App\Model\AdminUser');
    }

    /**
     * シェアハウスの登録、更新に対してトランザクション処理を実行
     *
     * @param $share
     * @param $request
     * @return mixed
     */
    public function share($share, $request)
    {
        try {
            DB::beginTransaction();
            $share->fill($request->all());
            $share->admin_users_id = $request->user()->id;
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            exit();
        }
    }
}
