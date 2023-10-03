@extends('layouts.app')
@section('head')

@endsection
@section('content')
<div class="container   mt-5">



      @if ( session('status'))
      <div class="col-6   mt-5 mx-auto">
        <div class="alert alert-info text-center " >
         
            {{session('status')}}
       
        </div>
      </div>
          
      @endif

<table class="table table-striped table-hover" id="users-table">
    <thead>
        <tr>
            <th scope="col" class="hide">#</th>
            <th scope="col" >Full Name</th>
            <th scope="col" class="hide">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Full info</th>
            <th scope="col">edit info</th>
            <th scope="col">Delete</th>
      </thead> 
    
       
      <tbody> 
               @php
                   $i=1;
               @endphp
        @foreach ($users as $user) 

        <tr>
            <td >{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td >{{$user->email}}</td>
            <td>{{$user->type==0 ? "Admin" : "SuperAdmin";}}</td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('users.show',$user->id)}}">info</a></td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('users.edit',$user->id)}}">edit</a></td>
            <td><form action="{{route('users.destroy',$user->id)}}" method="POST">
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
        $('#users-table').DataTable();
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