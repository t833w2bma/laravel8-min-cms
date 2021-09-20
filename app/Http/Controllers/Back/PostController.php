<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    
    public function index(){
        // 一覧画面
        $posts = Post::latest('id')->paginate(20);
        return view('back.posts.index', compact('posts'));

    }

 


    public function store(PostRequest $request){
        $post = Post::create($request->all());
        
        if ($post) {
            return redirect()
                ->route('back.posts.edit', $post)
                ->withSuccess('データを登録しました。');
        } else {
            return redirect()
                ->route('back.posts.create')
                ->withError('データの登録に失敗しました。');
        }
    }



    public function create(){
        return view('back.posts.create');
    }




    public function edit( Post $post ) {
        
        return view('back.posts.edit', compact('post'));
    }




    public function update(PostRequest $request, Post $post) {
        if ($post->update($request->all())) {
            $flash = ['success' => 'データを更新しました。'];
        } else {
            $flash = ['error' => 'データの更新に失敗しました'];
        }
     
        return redirect()
            ->route('back.posts.edit', $post)
            ->with($flash);
    }




    public function destroy(Post $post)
    {
        if ($post->delete()) {
            $flash = ['success' => 'データを削除しました。'];
        } else {
            $flash = ['error' => 'データの削除に失敗しました'];
        }
     
        return redirect()
            ->route('back.posts.index')
            ->with($flash);
    }
}
