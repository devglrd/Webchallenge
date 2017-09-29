<?php

namespace App\Http\Controllers;

use App\Design;
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
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $design = Design::where('slug', $slug)->firstOrFail();
        $tags = $this->getTags($slug);
        $countTags = count($tags);
        if($countTags != "0"){
            return view('app.statics.designs.show', compact('design','tags'));
        }else{
            return view('app.statics.designs.show', compact('design'));
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

        $designs = Design::where('slug',$slug)->with('tags')->first();

        $tags = $designs->tags;
        return $tags;
    }


}
