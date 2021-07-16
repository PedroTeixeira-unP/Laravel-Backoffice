@extends('layouts.app')

@section('content')
<div class="content-wrapper">
			<div class="page-header">
              <h3 class="page-title"> VIPs </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('vips')}}">Packages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">edit</li>
                </ol>
              </nav>
            </div>
<div class="row">
              <div class="col-md-4 grid-margin">
                <div class="card">
				<div class="card-body">
                    <h5 class="card-title">Package info</h5>
                    <form method="post" action="{{route('vips.update')}}">@csrf
						<input type="hidden" name="oldname" value="{{$pacotevips->Nome}}">
						<input type="hidden" name="id" value="{{$pacotevips->id}}">
                      <div class="form-group">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" id="Nome" name="Nome" value="{{ $pacotevips->Nome }}">
                      </div>
                      <div class="form-group">
                        <label for="Tipo">Tipo:</label>
					  <select class="form-control" id="Tipo" name="Tipo" style="color:white">
                                <option <?php if($pacotevips->Tipo == "Individuais"){?> selected="selected" <?php }?> 
									value="Individuais">Individuais</option>
                                <option <?php if($pacotevips->Tipo == "Organizações"){?> selected="selected" <?php }?> 
									value="Organizações">Organizações</option>
                                <option <?php if($pacotevips->Tipo == "Extra"){?> selected="selected" <?php }?> 
								value="Extra">Extra</option>
                              </select>
						</div>
                      <div class="form-group">
                        <label for="Valor">Valor</label>
                        <input type="text" class="form-control" id="Valor" name="Valor" value="{{ $pacotevips->Valor }}">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="Novidade" id="Novidade" <?php if($pacotevips->Novidade == '0'){?>  <?php }else{?> checked <?php } ?>> Novidade <i class="input-helper"></i></label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>				  
				</div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of package offers</h4>
					
                    <form method="post" action="{{route('vips.updatelista')}}">
                    <div class="add-items d-flex">
					@csrf
                      <input type="hidden" class="form-control todo-list-input" name="pacote_id" value="{{ $pacotevips->Nome }}">
                      <input type="text" class="form-control todo-list-input" name="oferta" placeholder="enter offer..">
                      <button type="submit" class="btn btn-primary mr-2">Add</button>
                    </div>
					</form>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
					  @foreach($listavips as $listavip)
						<form method="post" action="{{route('vips.deletelista')}}">@csrf
						<input type="hidden" name="id" value="{{$listavip->id}}">
                        <li>
							<button type="submit" onclick="return confirm('Are you sure to delete this ?');" style="border: 0; background: none;">
							
								<i type="submit" class="mdi mdi-close-box" style="color:white;"></i>
							</button>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">{{ $listavip->oferta}} <i class="input-helper"></i></label>
                          </div>
                        </li>
						</form>
						@endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

	
@endsection			
