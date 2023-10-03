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

<table class="table table-striped table-hover" id="clients-table">
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
        @foreach ($clients as $client) 

        <tr>
            <td >{{$i++}}</td>
            <td>{{$client->name}}</td>
            <td >{{$client->email}}</td>
            <td>{{$client->type}}</td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('clients.show',$client->id)}}">info</a></td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('clients.edit',$client->id)}}">edit</a></td>
            <td><form action="{{route('clients.destroy',$client->id)}}" method="POST">
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
        $('#clients-table').DataTable();
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