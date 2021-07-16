@extends('layouts.app')

@section('content')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
<div class="content-wrapper">
			<div class="page-header">
              <h3 class="page-title"> BANNERS </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('banners')}}">Banners</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Banner</h4>
                    <p class="card-description"> Banners from home page </p>
                    <form method="post" action="{{route('banners.update')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $banner->id }}">
                      <div class="form-group">
                        <label for="texto1">Texto 1</label>
                        <input type="text" class="form-control" value="{{ $banner->texto1 }}" id="texto1" name="texto1">
                        @error('texto1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="texto2">Texto 2</label>
                        <input type="text" class="form-control" value="{{ $banner->texto2 }}" id="texto2" name="texto2">
                        @error('texto2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="botao" id="botao" <?php if($banner->botao == 'Nao'){?>  <?php }else{?> checked <?php } ?>>

                      <label class="form-check-label" for="is_admin">
                      {{ __('Tem botao') }}
                      </label>
                      </div>
					  <div class="form-group">
                        <label for="link">link</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}">
                        @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <a href="{{ route('banners')}}"class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
@endsection
