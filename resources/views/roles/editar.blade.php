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
		{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
		
		<div class="mb-3">
		  <label for="name" class="form-label">Nombre del rol:</label>
		  {!! Form::text('name', $value=$role->name , array('class' => 'form-control')) !!}
		  @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="permission" class="form-label">Permisos del rol:</label>
		   <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
		  
		</div>

        <div class="mb-3">	 
		  <button type="submit" class="btn btn-primary mb-3">Editar Rol</button>
		  <a class="btn btn-success mb-3" href="{{route('roles.index')}}">Regresar</a>
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