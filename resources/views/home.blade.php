@extends('layouts.app')

@section('content')
<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="/public/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Bem-vindo</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Novo painel de Admin!</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Banners</h4>
                    @foreach($banners as $banner)
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">{{ $banner->texto1}}</h6>
                        <p class="text-muted mb-0">{{ $banner->texto2}}</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      @if($banner->botao == "Sim")
                        <p title="<?php echo $banner->link?>">Sim</p>
                      @else
                        <p>Nao</p>
                      @endif
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Projects</h4>
                      <p class="text-muted mb-1">Open pages</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon">
                                <i class="mdi mdi-security text-warning"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">VIPs</h6>
                                <p class="text-muted mb-0">view list</p>
                              </div>
                              <div class="mr-auto text-sm-right">
                               <a href="{{ route('vips')}}"> <div class="badge badge-outline-secondary">See +</div></a>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon ">
                                <i class="mdi mdi-comment-text text-info"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Banners</h6>
                                <p class="text-muted mb-0">view list</p>
                              </div>
                              <div class="mr-auto text-sm-">
                               <a href="{{route('banners')}}"> <div class="badge badge-outline-secondary">See +</div></a>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon">
                                <i class="mdi mdi-account text-danger"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Users</h6>
                                <p class="text-muted mb-0">view list</p>
                              </div>
                              <div class="mr-auto text-sm-right">
                               <a href="{{route('user')}}"> <div class="badge badge-outline-secondary">See +</div></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>          
@endsection
