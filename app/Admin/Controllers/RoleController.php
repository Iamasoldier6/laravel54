<?php

namespace App\Admin\Controllers;

use \App\AdminUser;

class RoleController extends Controller
{
    // 角色列表
    public function index()
    {
        return view("/admin/role/index");
    }

    // 创建角色
    public function create()
    {
        return view("/admin/role/add");
    }

    // 创建角色行为
    public function store()
    {

    }

    // 角色权限关系页面
    public function permission()
    {
        return view("/admin/role/permission");
    }

    // 储存角色权限行为
    public function storePermission()
    {

    }
}