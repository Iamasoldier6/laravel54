<?php

namespace App\Admin\Controllers;

use \App\AdminUser;

class PermissionController extends Controller
{
    // 权限列表页面
    public function index()
    {
        return view('/admin/permission/index');
    }

    // 创建权限
    public function create()
    {
        return view('/admin/permission/add');
    }

    // 创建权限实际行为
    public function store()
    {

    }
}