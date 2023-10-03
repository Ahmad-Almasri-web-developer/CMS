<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags= Tag::all();
        return view('cms.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $to_create= new Tag ;

        $to_create->tag=$request->input('tag');

        $to_create->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag= Tag::findOrFail($id);

        return view('cms.tags.info',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $tag= Tag::findOrFail($id);

        return view('cms.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $to_update=Tag::findOrFail($id);
        $to_update->tag=$request->input('tag');

        $to_update->save();
        return redirect('/tags')->with('status','Tag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        Tag::destroy($id);
        return redirect()->back()->with('status','Tag has been deleted successfully');
    }
}
