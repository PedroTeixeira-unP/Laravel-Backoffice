@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tabela dos Utilizadores</h4>
                    <p class="card-description">     </p>
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
                            <td> <a href="{{ route('edit')}}"><i class="mdi mdi-lead-pencil"></i></a><a href=""><i class="mdi mdi-delete"></i></a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection
