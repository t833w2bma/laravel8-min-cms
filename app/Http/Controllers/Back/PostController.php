<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Tag;

class PostController extends Controller
{
    
    public function index($tagSlug = null){
        // 一覧画面
        /*
            $posts = Post::latest('id')->paginate(20);
            一覧ページのクエリを確認するとレコードの数だけクエリが発行されているのでEager Loadingを使う
        */
        // 公開・新しい順に表示
        $posts = Post::publicList($tagSlug);
        $tags = Tag::all();
    
        return view('front.posts.index', compact('posts', 'tags'));

    }

 


    public function store(PostRequest $request){
        $post = Post::create($request->all());
        // タグを追加
        $post->tags()->attach($request->tags);

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
     
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('back.posts.create', compact('tags'));
    }




    public function edit( Post $post ) {
        
        return view('back.posts.edit', compact('post'));
    }




    public function update(PostRequest $request, Post $post) {
        // タグを更新
        $post->tags()->sync($request->tags);

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
        // タグを削除
        $post->tags()->detach();

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
