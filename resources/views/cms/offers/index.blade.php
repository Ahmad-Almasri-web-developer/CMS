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

<table class="table table-striped table-hover" id="offers-table">
    <thead>
        <tr>
            <th scope="col" class="hide">#</th>
            <th scope="col" >Title</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th scope="col">Full info</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
      </thead> 
    
       
      <tbody> 
               @php
                   $i=1;
               @endphp
        @foreach ($offers as $offer) 

        <tr>
            <td >{{$i++}}</td>
            <td>{{$offer->title}}</td>
            <td >{{$offer->status==0 ? "Active" : "deactivate";}}</td>
            <td>{{$offer->created_at}}</td>
            <td><a  type="submit" class="btn btn-warning" href="{{route('offers.show',$offer->id)}}">info</a></td>
            <td><form action="{{route('offers.update',$offer->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-warning" onclick="return confirm('Confirm')"> Change</button>
                </form></td>
            <td><form action="{{route('offers.destroy',$offer->id)}}" method="POST">
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
        $('#offers-table').DataTable();
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