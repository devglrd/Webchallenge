<?php

namespace App\Http\Controllers;

use App\Design;
use App\DesignCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Designs";

        //get all disagn
        $designs = DB::table('designs')->where('state', 2)->orderBy('id', 'desc')->Paginate(4);
        return view('app.statics.designs.index', compact('designs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $design = new Design();

        return view('app.statics.designs.create', compact('design'));
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
            "unique" => "Ce que vous voulez ajouté est deja utilisé !",
            "required" => "Ce :attribute est requis !",
        ];

        $this->validate($request, ["title" => "required",
            "content" => "required|string",
            "level_design" => "required|string"], $message);


        $slug = str_replace(' ', '-', $request->title);

        dd($request->title);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $design = Design::where('slug', $slug)->firstOrFail();

        // Category
        $category_id = $design->id;
        $category = $this->getCategory($category_id);

        // Tags
        $tags = $this->getTags($slug);
        $countTags = count($tags);
        if($countTags != "0"){
            return view('app.statics.designs.show', compact('design', 'category','tags'));
        }else{
            return view('app.statics.designs.show', compact('design', 'category'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        //
    }

    public function getTags($slug){

        $designs = Design::where('slug', $slug)->with('tags')->first();

        $tags = $designs->tags;
        return $tags;
    }

    public function getCategory($post_id){

        $category = DesignCategory::find($post_id)->name;

        $design_category = $category;
        return $design_category;
    }
}
