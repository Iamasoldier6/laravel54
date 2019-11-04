<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NoticeController extends Controller
{
    public function index()
    {
        // 获取当前用户
        $user = \Auth::user();
        $notices = $user->notices;

        return view('notice/index', compact('notices'));
    }
}
