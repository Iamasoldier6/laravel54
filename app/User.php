<?php

namespace App;

use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// 表 => posts
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];
}