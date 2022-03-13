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
              <th><a href="{{ url('/users') }}?sort=password<?php 
                if(isset($_GET['sort']) AND ($_GET['sort']=='password')){
                    if($_GET['desc']==0){echo('&desc=1');} 
                    else {echo('&desc=0');}
                } else {echo('&desc=0');}
                ?>">Password</a></th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>                
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