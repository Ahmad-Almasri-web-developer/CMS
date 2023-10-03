@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row">
      <div class="col-md-6" >

        <a href="{{route('users.create')}}" style="text-decoration: none; color:black;">


        <div class="card mb-4" style="height: 160px;">
          <div class="card-body">
            <h5 class="card-title">Create New User</h5>
            <p class="card-text">Here you can make new user and give him a permissions as you want like admin or superAdmin and store data of user .</p>
          </div>
        </div>
        </a>
      </div>

      <div class="col-md-6">
            <a href="{{route('manage')}}" style="text-decoration: none; color:black;">
      
        <div class="card mb-4" style="height: 160px;">
          <div class="card-body">
            <h5 class="card-title">Search & Manage</h5>
            <p class="card-text">Here you can find your Users and clients And managing them data And Here you can built tags and managing them.</p>
          </div>
        </div>
      </a>
      </div>

      <div class="col-md-6">
            <a href="{{route('clients.create')}}"style="text-decoration: none; color:black;">
    
        <div class="card mb-4" style="height: 160px;">
          <div class="card-body">
            <h5 class="card-title">Add New Client</h5>
            <p class="card-text">Here you can store data of client like he is address and phone number and type of client like important client , client interests and more .</p>
          </div>
        </div>
      </a>
      </div>

      <div class="col-md-6">
            <a href="{{route('offersManage')}}" style="text-decoration: none; color:black;">

        <div class="card mb-4" style="height: 160px;">
          <div class="card-body">
            <h5 class="card-title">Offers & Notify</h5>
            <p class="card-text">Here you can make an Offers and Notify clients who they are interest in .</p>
          </div>
        </div>
      </a>
      </div>

    </div>
  </div>
@endsection
