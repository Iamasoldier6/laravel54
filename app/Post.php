<?php

namespace App;

use App\Model;

use Laravel\Scout\Searchable;

// 表 => posts
class Post extends Model
{
    use Searchable;

    // 定义索引里面的type
    public function searchableAs()
    {
        return "post";
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    // 关联用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // 评论模型
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    // 和用户进行关联
    public function zan($user_id)
    {
        return $this->hasOne(Zan::class)->where('user_id', $user_id);
    }

    // 文章的所有赞
    public function zans()
    {
        return $this->hasMany(Zan::class);
    }
}