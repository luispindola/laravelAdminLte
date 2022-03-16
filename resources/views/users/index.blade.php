@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Usuarios</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        @can('crear-rol')
            
            <a class="btn btn-warning" href="{{ route('users.create') }}">Nuevo</a>                        
                
        @endcan
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th style="width: 10px">
                <a href="{{ url('/users') }}?sort=id<?php 
                if(isset($_GET['sort']) AND ($_GET['sort']=='id')){
                    if($_GET['desc']==0){echo('&desc=1');} 
                    else {echo('&desc=0');}
                } else {echo('&desc=0');}
                ?>">#</a>
              </th>
              <th>
                <a href="{{ url('/users') }}?sort=name<?php 
                if(isset($_GET['sort']) AND ($_GET['sort']=='name')){
                    if($_GET['desc']==0){echo('&desc=1');} 
                    else {echo('&desc=0');}
                } else {echo('&desc=0');}
                ?>">Nombre</a>
              </th>
              <th><a href="{{ url('/users') }}?sort=email<?php 
                if(isset($_GET['sort']) AND ($_GET['sort']=='email')){
                    if($_GET['desc']==0){echo('&desc=1');} 
                    else {echo('&desc=0');}
                } else {echo('&desc=0');}
                ?>">Email</a></th>
              <th>Rol</th>              
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $rolNombre)                                       
                      <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                    @endforeach
                  @endif
                </td>
                <td>
                  @can('editar-user')
                      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                  @endcan
                  
                  @can('borrar-user')
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  @endcan
                </td>                
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      
      <div class="card-footer clearfix">
        {{ $users->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
      </div>        

    </div>
    <!-- /.card -->
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop