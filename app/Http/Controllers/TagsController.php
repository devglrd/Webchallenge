<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function show($tag){

        $posts = Tag::where('name', $tag)->with('posts')->first()->posts;
        return view('.app.statics.blog.tags', compact('posts'));
    }
}
