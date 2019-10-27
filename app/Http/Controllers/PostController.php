<?php

namespace App\Http\Controllers;

use App\Comment;
use \App\Post;
use \App\Zan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 列表页面
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->withCount(["comments", "zans"])->paginate(6);
        return view("post/index", compact('posts'));
    }

    // 详情页面
    public function show(Post $post)
    {
        $post->load('comments');
        return view("post/show", compact('post'));
    }

    // 创建页面
    public function create()
    {
        return view("post/create");
    }

    // 创建逻辑
    public function store()
    {
        // 验证
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ]);

        // 逻辑
        $user_id = 1;
        $params = array_merge(request(['title', 'content']), compact('user_id'));
        $post = Post::create($params);

        // 渲染
        return redirect("/posts");
    }

    // 编辑页面
    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

    // 编辑逻辑
    public function update(Post $post)
    {
        // 验证
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ]);

        $this->authorize('update', $post);

        // 逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        // 渲染
        return redirect("/posts/{$post->id}");
    }

    // 删除逻辑
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect("/posts");
    }

    // 上传图片
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);
    }

    // 提交评论
    public function comment(Post $post)
    {
        // 验证
        $this->validate(request(), [
            'content' => 'required|min:3',
        ]);

        // 逻辑
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);

        // 渲染
        return back();
    }

    // 赞
    public function zan(Post $post)
    {
        $param = [
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ];

        Zan::firstOrCreate($param);

        return back();
    }

    // 取消赞
    public function unzan(Post $post)
    {
        $post->zan(Auth::id())->delete();
        return back();
    }

    // 搜索结果页
    public function search()
    {
        // 验证
        $this->validate(request(), [
            'query' => 'required'
        ]);
//
        // 逻辑
        $query = request('query');
        $posts = Post::search($query)->paginate(2);
//
        // 渲染
        return view("post/search", compact('posts', 'query'));
    }
}
