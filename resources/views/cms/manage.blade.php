@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row">
      <div class="col-md-4" >

        <a href="{{route('users.index')}}" style="text-decoration: none; color:black;">


        <div class="card mb-4" style="height: 175px;">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            <p class="card-text">Here you can managing users data like edit , delete And search and see info of user .</p>
          </div>
        </div>
        </a>
      </div>

      <div class="col-md-4">
            <a href="{{route('clients.index')}}" style="text-decoration: none; color:black;">
      
        <div class="card mb-4" style="height: 175px;">
          <div class="card-body">
            <h5 class="card-title">Clients</h5>
            <p class="card-text">Here you can managing clients data like edit , delete And search and see info of client .</p>
          </div>
        </div>
      </a>
      </div>

      <div class="col-md-4">
            <a href="{{route('tags.index')}}" style="text-decoration: none; color:black;">
      
        <div class="card mb-4" style="height: 175px;">
          <div class="card-body">
            <h5 class="card-title">Tags</h5>
            <p class="card-text">Here you can Create tags And managing like edit , delete And search and see who Interested in each tag</p>
          </div>
        </div>
      </a>
      </div>

    </div>
  </div>
@endsection
