@extends('layouts.app')
@section('head')
<style>
    .hidden {
  display: none;
}

</style>
@endsection
@section('content')


    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Make New Offer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('offers.store') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Offer Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description" required autocomplete="description" autofocus ></textarea>                        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3  ">
                        <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Choose') }}</label>
                        <div class="col-md-6">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioButtons" value="none" onclick="toggleDivs()">
                        <label class="form-check-label" for="inlineRadio1">Just make offer</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioButtons" value="div1" onclick="toggleDivs()">
                        <label class="form-check-label" for="inlineRadio1">offer clients by type and tag</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioButtons" value="div2" onclick="toggleDivs()">
                        <label class="form-check-label" for="inlineRadio1">offer client by email</label>
                        </div>
                        </div>  

                        <div id="div1"   class="hidden">


                     <div class="row my-4  ">
                        <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Just for specific Client Type') }}</label>
                        <div class="col-md-6">
                        
                        <ul class="list-group list-group ">

                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="type[]" value="Normal" aria-label="..." />
                            Normal
                        </li>

                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="type[]" value="Important" aria-label="..." />
                            Important
                        </li>

                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="type[]" value="Very Important" aria-label="..." />
                            Very Important
                        </li>
                    
                        </ul>
                        </div>                
                        </div> 
                   
                        <div class="row mb-3  ">
                        <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Just for specific Interest list of tags') }}</label>
                        <div class="col-md-6">
                        
                        <ul class="list-group list-group ">

                            @foreach($tags as $tag)
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="tag[]" value="{{ $tag->tag}}" aria-label="..." />
                            {{$tag->tag}}
                        </li>
                        @endforeach
                        </ul>
                        </div>                
                        </div> 


                        </div>

                        <div id="div2"  class="hidden">
                        <div class="row my-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('OR BY EMAIL') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter Client Email">
                        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a  type="submit" class="btn btn-warning " href="{{route('home')}}">back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make it !') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
function toggleDivs() {
  const radioButtons = document.getElementsByName("radioButtons");
  const div1 = document.getElementById("div1");
  const div2 = document.getElementById("div2");

  for (let i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      if (radioButtons[i].value === "none") {
        div1.classList.add("hidden");
        div2.classList.add("hidden");
      } else if (radioButtons[i].value === "div1") {
        div1.classList.remove("hidden");
        div2.classList.add("hidden");
      } else if (radioButtons[i].value === "div2") {
        div1.classList.add("hidden");
        div2.classList.remove("hidden");
      }
    }
  }
}



</script>
@endsection