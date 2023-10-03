@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row">
      <div class="col-md-6" >

        <a href="{{route('offers.index')}}" style="text-decoration: none; color:black;">


        <div class="card mb-6" style="height: 175px;">
          <div class="card-body">
            <h5 class="card-title">Managing Offers</h5>
            <p class="card-text">Here you can managing Offers data like  Desactive  , delete And search.</p>
          </div>
        </div>
        </a>
      </div>

      <div class="col-md-6">
            <a href="{{route('offers.create')}}" style="text-decoration: none; color:black;">
      
        <div class="card mb-6" style="height: 175px;">
          <div class="card-body">
            <h5 class="card-title">Make An Offers</h5>
            <p class="card-text">Here you can make an offer and send to your clients emails by tags like: "villa" or type of clients like: "important clients"  or for specific person  .</p>
          </div>
        </div>
      </a>
      </div>

    

    </div>
  </div>
@endsection
