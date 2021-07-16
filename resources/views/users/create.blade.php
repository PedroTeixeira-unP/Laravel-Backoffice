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
                  <li class="breadcrumb-item active" aria-current="page">create</li>
                </ol>
              </nav>
            </div>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Create User</h5>
                    <p class="card-description"> New user made by Admin</p>
                    <form method="post" action="{{route('user.create')}}">
                    @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Insert name" id="name" name="name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insert email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
					  <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Insert password">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="show_pass" for="show_pass" onclick="myFunction()">
							<label class="form-check-label" for="show_pass">
								{{ __('Show password') }}
							</label>
						</div>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $password }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin" >

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
			  <script>
			  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
			  </script>
@endsection
