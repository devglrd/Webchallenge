<?php

namespace App\Http\Controllers;

use App\Design;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = "designs";

        $items = Design::with('author')->orderBy('id', 'desc')->Paginate(4);

        $user = User::where('id', Auth::id())->get();

        if(Auth::user()){
            if ($user[0]->is_designer == 1){
                $is_designer = 'designer';
            }
        }

        return view('app.statics.designs.index', compact('items', 'section', 'is_designer'));

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
            "unique"            => "Ce que vous voulez ajouté est deja utilisé !",
            "required"          => "Ce :attribute est requis !",
        ];

        $this->validate($request, [
            "title"             => "required",
            "content"           => "required|string",
            "level_design"      => "required"
        ], $message);


        $title = $request->title;

        $slug = str_replace(' ', '-', $title);

        Design::create([
            "title"             => $request->title,
            "slug"              => $slug,
            "content"           => $request->content,
            "level_design"      => $request->level_design[0],
            'state'             => 2,
            'id_author'         => Auth::id(),
            'id_category'       => rand(1, 10)
        ]);

        return redirect()->route('designs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $section = "designs";

        $designAll = Design::where('slug', $slug)->with('author')->get();
        $design = $designAll[0];

        // Category
        $post_category_id = $design->id_category;
        $category = $this->getCategory($post_category_id);

        // Tags
        $tags = $this->getTags($slug);
        $countTags = count($tags);
        if($countTags != "0"){
            return view('app.statics.designs.show', compact('design', 'category', 'section','tags'));
        }else{
            return view('app.statics.designs.show', compact('design', 'category', 'section'));
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

        $category = Category::find($post_id)->name;

        $design_category = $category;
        return $design_category;
    }
}
