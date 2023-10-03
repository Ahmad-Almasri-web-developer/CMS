<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients= Client::all();
        return view('cms.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('cms.clients.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'tel' => 'integer',

     
        ]);

        $to_create= new Client ;
        if( $request->id_img !=null){
            $to_create->id_img = $this->uploadImage( $request->id_img );
        }
        
        $to_create->name=$request->input('name');
        $to_create->email=$request->input('email');
        $to_create->tel=$request->input('tel');
        $to_create->address=$request->input('address');
        $to_create->type=$request->input('type');
        $to_create->save();
        $to_create->tags()->syncWithoutDetaching($request->input('tag'));
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client= Client::findOrFail($id);

        return view('cms.clients.info',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client= Client::findOrFail($id);
        $tags=Tag::all();

        return view('cms.clients.edit',compact('client','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'name' => 'required|alpha:ascii',
            'tel' => 'integer',
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('clients')->ignore($id)]
     
        ]);

        $to_update=Client::findOrFail($id);

        if ($request->has('id_img')!=null) {
            if( $to_update->id_img != null){
                Storage::disk('public')->delete($to_update->id_img);
            }
   
            $to_update->id_img = $this->uploadImage($request->id_img);
        }

        $to_update->name=$request->input('name');
        $to_update->email=$request->input('email');
        $to_update->tel=$request->input('tel');
        $to_update->address=$request->input('address');
        $to_update->type=$request->input('type');

    
        $to_update->save();
        if($request->input('tag') != null){
            $to_update->tags()->sync($request->input('tag'));
        }
        
        return redirect('/clients')->with('status','client has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        client::destroy($id);
        return redirect()->back()->with('status','client has been deleted successfully');
    }
}
