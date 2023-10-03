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
   
    <form action="{{route('clients.update',$client->id)}}"  class="form-edit p-4"method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
   <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="name && last name" value="{{ $client->name }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ $client->email }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>

  <div class="mb-3">
    <label for="tel" class="form-label">Tel</label>
    <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="tel" value="{{ $client->tel }}">
    @error('tel')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>


  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="address" value="{{ $client->address }}">
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>







  
  <div class="mb-3">
    <label for="client_type" class="form-label">Type</label>
    <select name="type" class="form-select" >
      <option selected value="{{$client->type}}">Current type is {{$client->type}}</option>                     
      <option selected value="Normal">Normal</option>
      <option value="Important">Important</option>
      <option value="Very Important">Very Important</option>
                                 
    </select>
    <div class="mb-3">
      <label for="id_img" class="form-label">id_img</label>
      <input type="file" name="id_img" class="form-control" placeholder="id_img">
    </div>
    <div class="mb-3">
    <label for="interest" class="form-label">Interested in</label>
    <p class="card-text bg-success text-white ps-2 pb-1">
              @foreach($client->tags as $tag)
              {{$tag->tag}} ,
              @endforeach
              </p>

  </div>

    <div class="row mb-3  ">
                        <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Interest list of tags') }}</label>
                        <div class="col-md-6">
                        
                        <ul class="list-group list-group ">
                            @foreach($tags as $tag)
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="tag[{{$tag->id}}]" value="{{ $tag->id}}" aria-label="..." />
                            {{$tag->tag}}
                        </li>
                        @endforeach
                        </ul>
                        </div>                
                        </div> 



  
    
  <button class="btn btn-success mt-4" >Update</button>
</form>

</div>
@endsection
@section('script')

@endsection