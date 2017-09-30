<?php

namespace App\Http\Controllers;

use App\Category;
use App\Design;
use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Blog";

        $post = Post::with('author')->Paginate(4);

        return view('.app.statics.blog.index', compact('title', 'post'));
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
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug){

        $postAll = Post::where('slug', $slug)->with('author')->get();

        $post = $postAll[0];


        // Category's Post
        $post_id = $post->id;
        $category = $this->getCategory($post_id);

        // Author
        //$author = $this->getAuthor($post_id);

        // Relation Post as Tags
        $tags = $this->getTagsOfPost($slug);
        $countTags = count($tags);
        if($countTags != "0"){
            return view('.app.statics.blog.show', compact('post','category', 'tags'));

        }else{
            return view('.app.statics.blog.show', compact('post','category'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function getAuthor($id){
        $post = Post::with('author')->get();

        return $post->author;
    }

    public function getTagsOfPost($slug){

        $tags = Post::where('slug', $slug)->with('tags')->first()->tags;
        return $tags;
    }

    public function getCategory($post_id){

        $category = PostCategory::find($post_id)->name;

        $post_category = $category;
        return $post_category;
    }

}
