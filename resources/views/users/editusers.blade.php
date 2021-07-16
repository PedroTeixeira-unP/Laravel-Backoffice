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
              <h3 class="page-title"> USERS </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('user')}}">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <p class="card-description"> Name, Email e Role </p>
                    <form method="post" action="{{route('user.update')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $users->id }}">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $users->name }}" id="name" name="name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin" <?php if($users->is_admin == '0'){?>  <?php }else{?> checked <?php } ?>>

                      <label class="form-check-label" for="is_admin">
                      {{ __('Admin') }}
                      </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <a href="{{ route('user')}}"class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
@endsection
