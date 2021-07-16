<?php

namespace App\Http\Controllers;

use App\Models\Share;

use Illuminate\Http\Request;

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
}
