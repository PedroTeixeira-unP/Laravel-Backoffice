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
              <h3 class="page-title"> VIPs </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('vips')}}">Packages</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="page-header">
              <h3 class="page-title"> Packages </h3>
			  <nav aria-label="breadcrumb">
              <a href="{{route('vips.view')}}" class="btn btn-primary btn-fw">New Package</a>
              </nav>
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Nome</th>
                            <th> Tipo </th>
                            <th> Valor </th>
							<th> Novidade </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($pacotevips as $pacotevip)
                          <tr>
                            <td> {{ $pacotevip->Nome }} </td>
                            <td> {{ $pacotevip->Tipo }} </td>
                            <td> {{ $pacotevip->Valor }}  </td>
							<td><?php if($pacotevip->Novidade == 0){ echo "False";}else{ echo "True";}?></td>
                            <td> <a href="{{ route('vips.edit', ['id' => $pacotevip->id],['nome' => $pacotevip->Nome ]) }}"><i class="mdi mdi-lead-pencil"></i></a>
								<a onclick="return confirm('Are you sure to delete this Package and all its offers?');" href="{{ route('vips.delete', ['id' => $pacotevip->id]) }}"><i class="mdi mdi-delete"></i></a>
							</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
	
@endsection
