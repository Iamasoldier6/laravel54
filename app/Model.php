<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

// 表 => posts
class Model extends BaseModel
{
    //
    protected $guarded = []; // 不可注入的字段
//    protected $fillable = ['title', 'content']; // 可以注入数据字段
}
