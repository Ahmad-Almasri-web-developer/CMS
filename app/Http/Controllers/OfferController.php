<?php

namespace App\Http\Controllers;

use App\Mail\ClientMail;
use App\Models\Client;
use App\Models\Offer;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $offers=Offer::all();

        return view('cms.offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags=Tag::all();

        return view('cms.offers.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $email=$request->input('email') ;
        $type=$request->input('type');
        $formBy=$request->input('radioButtons');
        
        $tag=$request->input('tag');

        $title=$request->input('title');
        $description=$request->input('description');
        $to_create=new Offer;
        $to_create->title=$title;
        $to_create->description=$description;


 if($formBy != 'none' && $formBy != null ){

   // begin of email condition 1 
    if($email != null){
        $find=Client::where('email', $email)->first();
        if($find != null){
            $name=$find->name;
            Mail::to($email)->send(new ClientMail($name,$title,$description));
            $to_create->save();
            $to_create->clients()->syncWithoutDetaching($find->id);

        }else{
            return redirect()->back()->withErrors(['email' => 'that email does not exist as client']);
        }
    }
      // end of email condition 1

 // starting  condition 2 
elseif($type != null xor $tag != null){
  if($type !=null){
    $find=Client::whereIn('type', $type)->get();
    foreach( $find as $find){
        $name=$find->name;
        Mail::to($find->email)->send(new ClientMail($name,$title,$description));
        $to_create->save();
        $to_create->clients()->syncWithoutDetaching($find->id);
    }

  }else{

    $find = Client::whereHas('tags', function ($query) use ($tag) {
        $query->whereIn('tag', $tag);
    })->get();
    foreach( $find as $find){
        $name=$find->name;
        Mail::to($find->email)->send(new ClientMail($name,$title,$description));
        $to_create->save();
        $to_create->clients()->syncWithoutDetaching($find->id);
    }

  }
}
  // Ending condition 2

 // starting  condition 3 
 elseif($type != null && $tag != null){
    $find = Client::whereHas('tags', function ($query) use ($tag,$type) {
        $query->whereIn('tag', $tag)->where('type',$type);
    })->get();
    foreach( $find as $find){
        $name=$find->name;
        Mail::to($find->email)->send(new ClientMail($name,$title,$description));
        $to_create->save();
        $to_create->clients()->syncWithoutDetaching($find->id);
    }

  }
 // Ending condition 3 

  // starting  condition 4 
  elseif($type == null xor $tag == null){
     if($type == null){
        
        $find = Client::whereHas('tags', function ($query) use ($tag) {
            $query->whereIn('tag', $tag);
        })->get();
        foreach( $find as $find){
            $name=$find->name;
            Mail::to($find->email)->send(new ClientMail($name,$title,$description));
            $to_create->save();
            $to_create->clients()->syncWithoutDetaching($find->id);
        }

     }else{
        $find=Client::whereIn('type', $type)->get();
        foreach( $find as $find){
            $name=$find->name;
            Mail::to($find->email)->send(new ClientMail($name,$title,$description));
            $to_create->save();
            $to_create->clients()->syncWithoutDetaching($find->id);
        }
        
     }

  }
 // Ending condition 4 


   // starting  condition 5
   elseif($type == null && $tag == null){

       $find=Client::all();
       foreach( $find as $find){
           $name=$find->name;
           Mail::to($find->email)->send(new ClientMail($name,$title,$description));
           $to_create->save();
           $to_create->clients()->syncWithoutDetaching($find->id);
       }
       
 

 }
// Ending condition 5 

return redirect('/offers')->with('status','Offer has been made successfully And sended Clients emails successfully ');

    }

         return redirect('/offers')->with('status','Offer has been made successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offer= Offer::findOrFail($id);

        return view('cms.offers.info',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $to_update= Offer::findOrFail($id);

        if($to_update->status == 0){
            $to_update->status=1;
        }else{
            $to_update->status=0;
        }
        $to_update->save();
        return redirect()->back()->with('status','Offer status  has been updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Offer::destroy($id);

        return redirect()->back()->with('status','Offer has been deleted successfully');

    }

    public function clients($id)
    {    
        
        $offer= Offer::findOrFail($id);
        $clients= $offer->clients;


 
        return view('cms.clients.index',compact('clients'));


    }

}
