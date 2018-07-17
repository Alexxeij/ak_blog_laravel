<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


class PostController extends Controller
{
    public function index(){

        $all = Post::select(['id','title','image','excerpt','slug'])->get();

      //  dump($all);

        return view('welcome') ->with(['all' => $all]);
    }

    // one post

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($slug)
    {
        // If user come from ols link where was id then make 301 redirect.
        if (is_numeric($slug)) {
            // Get post for slug.
            $post = Post::findOrFail($slug);

            return Redirect::to(route('post.show', $post->slug), 301);
        }

        // Get post for slug.
        $post = Post::whereSlug($slug)->firstOrFail();

      //  dump($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
