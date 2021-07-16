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
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="page-header">
              <h3 class="page-title"> Banners </h3>
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Blue text </th>
                            <th> White text </th>
                            <th> Botao </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                          <tr>
                            <td> {{ $banner->texto1 }} </td>
                            <td> {{ $banner->texto2 }} </td>
                            <td> {{ $banner->botao }}  </td>
                            <td> <a href="{{ route('banners.edit', ['id' => $banner->id]) }}"><i class="mdi mdi-lead-pencil"></i></a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection
