@extends('layouts.app')
@section('head')
<style> 

   </style>
@endsection
@section('content')


        

     <div class="col-4 mx-auto my-5 bg-warning p-3">

   
     

             <h4 class="card-title fw-bold mb-3 ">Tag Name</h4>
             <h5 class="card-title fw-bold mb-5 bg-success text-white ps-2 pb-1" >{{$tag->tag}}</h5>
             <h6 class="fw-bold">Clients Interested in this Tag</h6 >
              <div class="btn-group" role="group" aria-label="Basic example">
              @foreach($tag->clients as $client)
              <a href="{{route('clients.show',$client->id)}}" class="btn btn-success">{{$client->name}}</a>
              @endforeach
  
            
               </div>

  
   
    </div>


@endsection
@section('script')

@endsection