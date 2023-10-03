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
   
    <form action="{{route('tags.update',$tag->id)}}"  class="form-edit p-4"method="POST" >
        @csrf
        @method('PUT')
        
   <div class="mb-3">
    <label for="tag" class="form-label">Tag Name</label>
    <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror"  placeholder="Tag " value="{{ $tag->tag }}">

  </div>

    
  <button class="btn btn-success mt-4" >Update</button>
</form>

</div>
@endsection
@section('script')

@endsection