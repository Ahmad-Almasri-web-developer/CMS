@extends('layouts.app')
@section('head')
<style> 

   </style>
@endsection
@section('content')


        

     <div class="col-4 mx-auto my-5 bg-warning p-3">

   
     

             <h4 class="card-title fw-bold mb-3 ">Title</h4>
             <h5 class="card-title fw-bold mb-5 bg-success text-white ps-2 pb-1" >{{$offer->title}}</h5>
             <h6 class="fw-bold">Description</h6 >
             <p class="card-text bg-success text-white ps-2 pb-1">{{$offer->description}}</p>
             <h6 class="fw-bold">Show Clients who has received this offer</h6 >
             <a href="{{route('clientsOffer',$offer->id)}}" class="btn btn-success">Clients</a>


    </div>


@endsection
@section('script')

@endsection