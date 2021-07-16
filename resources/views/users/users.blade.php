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
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="page-header">
              <h3 class="page-title"> Users </h3>
              <nav aria-label="breadcrumb">
              <a href="{{ route('user.createview')}}" class="btn btn-primary btn-fw">New User</a>
              </nav>
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Admin </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> 
                            @if( $user->is_admin  == 1)
                                True
                            @else
                                False
                            @endif
                            </td>
                            <td> <a href="{{ route('user.edit', ['id' => $user->id]) }}"><i class="mdi mdi-lead-pencil"></i></a><a href="{{ route('user.delete', ['id' => $user->id]) }}"><i class="mdi mdi-delete"></i></a></td>
                          </tr>
						  
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
			  
@endsection
