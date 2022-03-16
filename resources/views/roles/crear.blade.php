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
        <h3 class="card-title">Crear Rol</h3>
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
		{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
		
		<div class="mb-3">
		  <label for="name" class="form-label">Nombre del rol:</label>
		  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
		  name="name" 
		  value="{{old('name')}}" 
		  placeholder="Nombre del rol">
		  @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="permission" class="form-label">Permisos del rol:</label>
		   <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
		  
		</div>

        <div class="mb-3">	 
		  <button type="submit" class="btn btn-primary mb-3">Crear Rol</button>
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