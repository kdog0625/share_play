<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharesController extends Controller
{
    //シェアハウス一覧
    public function index() {
        $shares = [
            (object) [
                'id' => 1,
                'shara_name' => 'タイトル1',
                'prefecture_name' => '本文1',
                'created_at' => now(),
            ],
        ]
        return view('shares.index', ['shares' => $shares]);
    }
}
