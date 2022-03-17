@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class="row">
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Editar Rol</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      	@if ($errors->any())
		    <div class="alert alert-danger alert-dismissable">
		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
		
		<div class="mb-3">
		  <label for="name" class="form-label">Nombre:</label>
		  {!! Form::text('name', $value=$user->name, array('class' => 'form-control')) !!}
		  @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="email" class="form-label">Email:</label>
		  {!! Form::text('email', $value=$user->email, array('class' => 'form-control')) !!}
		  @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="password" class="form-label">Password:</label>
		  {!! Form::text('password', '', array('class' => 'form-control')) !!}
		  @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="confirm-password" class="form-label">Confirmar password:</label>
		  {!! Form::text('confirm-password', old('confirm-password'), array('class' => 'form-control')) !!}
		  @error('confirm-password')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="confirm-password" class="form-label">Roles:</label>
		  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control', 'placeholder' => 'Seleccione uno o varios roles...','multiple')) !!}
		  @error('roles')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

        <div class="mb-3">	 
		  <button type="submit" class="btn btn-primary mb-3">Editar Usuario</button>
		  <a class="btn btn-success mb-3" href="{{route('users.index')}}">Regresar</a>
		</div>
		{!! Form::close() !!}                        
      </div>
      <!-- /.card-body -->                 
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