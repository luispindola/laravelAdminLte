@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Roles</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
            @can('crear-rol')
            
        		<a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>                        
                
        	@endcan
            
            <table class="table table-striped mt-2">
                <thead>                                                       
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>  
                <tbody>
                @foreach ($roles as $role)
                <tr>                           
                    <td>{{ $role->name }}</td>
                    <td>                                
                        @can('editar-rol')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                        @endcan
                        
                        @can('borrar-rol')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
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
      
      <div class="pagination justify-content-end">
        {!! $roles->links() !!} 
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