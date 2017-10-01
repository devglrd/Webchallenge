<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function getPostsByCategory($name){
        $section = "posts";

        $items = Category::where('name', $name)->first()->posts;
        return view('app.statics.blog.index',compact('section','items'));
    }

    public function getDesignsByCategory($name){
        $section = "designs";

        $items = Category::where('name', $name)->first()->designs;
        return view('app.statics.blog.index',compact('section','items'));
    }
}
