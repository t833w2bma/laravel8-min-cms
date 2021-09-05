<?php

namespace App\Http\Controllers\Front;
 
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //// 公開・新しい順に表示
        // $posts = Post::where('is_public', true)
        //             ->orderBy('published_at', 'desc')
        //             ->paginate(10);
        /* モデルのスコープ関数 */
        $posts = Post::publicList(); // ← PostModelのscopePublicListメソッド実行｡上の部分が書いてある

        return view('front.posts.index', compact('posts'));
    }

    /**
     * 詳細画面
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(int $id){
      /*   $post = Post::where('is_public', true)
                ->findOrFail($id);
        モデルのスコープ関数 */
        $post = Post::publicFindById($id);
        return view('front.posts.show', compact('post'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
