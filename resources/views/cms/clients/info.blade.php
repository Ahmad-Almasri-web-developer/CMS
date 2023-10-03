@extends('layouts.app')
@section('head')
<style> 

   </style>
@endsection
@section('content')


        

     <div class="col-4 mx-auto my-5 bg-warning p-3">

   
     

             <h4 class="card-title fw-bold mb-3 ">Full Name</h4>
             <h5 class="card-title fw-bold mb-5 bg-success text-white ps-2 pb-1" >{{$client->name}}</h5>
             <h6 class="fw-bold">Email</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">{{$client->email}}</p>
             <h6 class="fw-bold">TEL</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">{{$client->tel}}</p>
             <h6 class="fw-bold">Address</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">{{$client->address}}</p>
             <h6 class="fw-bold">Client Interest list</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">
              @foreach($client->tags as $tag)
              {{$tag->tag}} ,
              @endforeach
              </p>
             
             <h6 class="fw-bold">Client Type</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">{{$client->type}}</p>
      
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ID
  </button>
  
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-success">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel"> ID</h1>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img class="card-img-top" alt="..."src="{{ asset('storage/' . $client->id_img) }}" style="height: 400px; width: 100%;" >
        </div>

      </div>
    </div>
  </div>
  
   
    </div>


@endsection
@section('script')

@endsection