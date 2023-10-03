<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users= User::all();
        return view('cms.users.index',compact('users'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => 'integer',

     
        ]);

        $to_create= new User ;
        if( $request->id_img !=null){
            $to_create->id_img = $this->uploadImage( $request->id_img );
        }

        $to_create->name=$request->input('name');
        $to_create->email=$request->input('email');
        $to_create->tel=$request->input('tel');
        $to_create->address=$request->input('address');
        $to_create->type=$request->input('type');
        $to_create->password=Hash::make(strip_tags($request->input('password')));
        $to_create->save();
        return redirect('/home');
        
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $user= User::findOrFail($id);

        return view('cms.users.info',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $user= User::findOrFail($id);

        return view('cms.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
            'tel' => 'integer',

     
        ]);

        $to_update=User::findOrFail($id);

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


        if ($request->input('password')) {
            $to_update->password=Hash::make(strip_tags($request->input('password')));
        }

    
        $to_update->save();
        return redirect('/adminstration/users')->with('status','User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        User::destroy($id);
        return redirect()->back()->with('status','User has been deleted successfully');
    }
}
