<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // 登录展示页
    public function index()
    {
        return view('/admin/login/index');
    }

    /*
     * 具体登陆
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'password' => 'required|min:6|max:30',
        ]);

        $user = request(['name', 'password']);
        if (true == Auth::guard('admin')->attempt($user)) {
            return redirect('/admin/home');
        }

        return Redirect::back()->withErrors("用户名密码错误");
    }

    // 登出
    public function logout()
    {
        \Auth::guard("admin")->logout();
        return redirect('/admin/login');
    }
}