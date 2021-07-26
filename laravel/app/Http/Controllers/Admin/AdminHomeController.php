<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\SharesService;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class AdminHomeController
 * @package App\Http\Controllers\Admin
 */
class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $sharesService;

    public function __construct(SharesService $sharesService)
    {
        $this->sharesService = $sharesService;
        $this->middleware('auth:admin');
    }

    /**
     * 管理者の投稿したシェアハウス一覧の取得
     * @return Renderable
     */
    public function index(): Renderable
    {
        $admin_shares = $this->sharesService->list();
        return view('admin.home', ['admin_shares'=>$admin_shares]);
    }
}
