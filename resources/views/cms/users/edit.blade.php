@extends('layouts.app')
@section('head')
<style> 
    .form-edit{
      background-color: rgb(224, 224, 224);
      width: 400px;
  
    }
  
    @media only screen and (max-width: 600px) {
   
        .form-edit{
          width: 100%;
        }
      }
  
   </style>
@endsection
@section('content')
<div class="container div-form d-flex justify-content-center mt-5 "> 
   
    <form action="{{route('users.update',$user->id)}}"  class="form-edit p-4"method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
   <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="name && last name" value="{{ $user->name }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ $user->email }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>

  <div class="mb-3">
    <label for="tel" class="form-label">Tel</label>
    <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="tel" value="{{ $user->tel }}">
    @error('tel')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>







  
  <div class="mb-3">
    <label for="user_type" class="form-label">Type</label>
    <select name="type" class="form-select" >
      <option selected value="{{$user->type}}">Current type is {{$user->type==0 ? "Admin" : "SuperAdmin";}}</option>                     
      <option value="0">Admin</option>
      <option value="1">SuperAdmin</option>

    </select>
    <div class="mb-3">
      <label for="id_img" class="form-label">id_img</label>
      <input type="file" name="id_img" class="form-control" placeholder="id_img">
    </div>

    <div class="row mb-3">
      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

      <div class="col-md-6">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  
    
  <button class="btn btn-success mt-4" >Update</button>
</form>

</div>
@endsection
@section('script')

@endsection