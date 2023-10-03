@extends('layouts.app')
@section('head')

@endsection
@section('content')
<div class="container   mt-5">

<div class="text-center m-4">

 
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Create New Tag
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Tag</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('tags.store')}}" method="post">
      @csrf
      <div class="modal-body">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tag</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tag name Like villa" name="tag" required>
      </div>

      </div>
      <div class="modal-footer">
        <button  class="btn btn-success">Create</button>
 
        </form>
      </div>
    </div>
  </div>
</div>


</div>

      @if ( session('status'))
      <div class="col-6   mt-5 mx-auto">
        <div class="alert alert-info text-center " >
         
            {{session('status')}}
       
        </div>
      </div>
          
      @endif

<table class="table table-striped table-hover" id="tags-table">
    <thead>
        <tr>
            <th scope="col" class="hide">#</th>
            <th scope="col" >Tag</th>
            <th scope="col">Full info</th>
            <th scope="col">edit info</th>
            <th scope="col">Delete</th>
      </thead> 
    
       
      <tbody> 
               @php
                   $i=1;
               @endphp
        @foreach ($tags as $tag) 

        <tr>
            <td >{{$i++}}</td>
            <td>{{$tag->tag}}</td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('tags.show',$tag->id)}}">info</a></td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('tags.edit',$tag->id)}}">edit</a></td>
            <td><form action="{{route('tags.destroy',$tag->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Confirm')"> delete</button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    
    
    </table>
    
    </div>
@endsection
@section('script')
<script>
    $(document).ready( function () {
        $('#tags-table').DataTable();
    } );
    $("document").ready(function()
    {
        setTimeout(function()
        {
            $("div.alert").remove();
        }, 3000);
    });
    </script>
@endsection