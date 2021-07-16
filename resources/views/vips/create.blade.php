@extends('layouts.app')

@section('content')
<div class="content-wrapper">
			<div class="page-header">
              <h3 class="page-title"> VIPs </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('vips')}}">Packages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
              </nav>
            </div>
<div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
				<div class="card-body">
                    <h5 class="card-title">Package</h5>
                    <form method="post" action="{{route('vips.create')}}">@csrf
                      <div class="form-group">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" id="Nome" name="Nome" >
                      </div>
                      <div class="form-group">
                        <label for="Tipo">Tipo:</label>
					  <select class="form-control" id="Tipo" name="Tipo" style="color:white">
                                <option value="Individuais">Individuais</option>
                                <option value="Organizações">Organizações</option>
                                <option value="Extra">Extra</option>
                              </select>
						</div>
                      <div class="form-group">
                        <label for="Valor">Valor</label>
                        <input type="text" class="form-control" id="Valor" name="Valor" value="10€">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="Novidade" id="Novidade" > Novidade <i class="input-helper"></i></label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>				  
				</div>
              </div>
            </div>

	
@endsection			
