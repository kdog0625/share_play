<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharesController extends Controller
{
    //シェアハウス一覧
    public function index() {
        return view('shares.index');
    }
}
