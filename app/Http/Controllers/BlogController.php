<?php

namespace App\Http\Controllers;

use App\Category;
use App\Design;
use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $section = "posts";

        $posts = Post::with('author')->orderBy('id', 'desc')->Paginate(4);

        return view('.app.statics.blog.index', compact('section', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();

        return view('app.statics.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            "required"          => "Ce :attribute est requis !",
        ];

        $this->validate($request, [
            "title"             => "required",
            "content"           => "required|string"
        ], $message);


        $title = $request->title;

        $slug = str_replace(' ', '-', $title);

        Post::create([
            "title"             => $request->title,
            "slug"              => $slug,
            "content"           => $request->content,
            'id_author'         => Auth::id(),
            'id_postcategory'   => rand(1, 10)
        ]);

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug){

        $section = 'posts';
        $postAll = Post::where('slug', $slug)->with('author')->get();

        $post = $postAll[0];

        // Category's Post
        $post_id = $post->id_postcategory;
        $category = $this->getCategory($post_id);

        // Relation Post as Tags
        $tags = $this->getTagsOfPost($slug);
        $countTags = count($tags);
        if($countTags != "0"){
            return view('.app.statics.blog.show', compact('post','category','section', 'tags'));
        }else{
            return view('.app.statics.blog.show', compact('post','category','section'));
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
