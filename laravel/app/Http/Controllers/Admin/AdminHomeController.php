<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Share;
use Illuminate\Contracts\Support\Renderable;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     * 管理者のトップページ
     * @return Renderable
     */
    public function index()
    {
        $admin_shares = Share::all()->sortByDesc('created_at');
        return view('admin.home', ['admin_shares'=>$admin_shares]);
    }
}
