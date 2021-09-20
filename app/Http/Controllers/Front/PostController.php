<?php

namespace App\Http\Controllers\Front;
 
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
        //// 公開・新しい順に表示
        // $posts = Post::where('is_public', true)
        //             ->orderBy('published_at', 'desc')
        //             ->paginate(10);
        /* モデルのスコープ関数 */



    public function index(string $tagSlug = null)
    {
        // 公開・新しい順に表示
        $posts = Post::publicList($tagSlug);
        $tags = Tag::all();

        return view('front.posts.index', compact('posts', 'tags'));
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




}
