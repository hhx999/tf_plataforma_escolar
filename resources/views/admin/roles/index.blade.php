@extends('admin.layout')

@section('header')

      <h1>
        Roles
        <small>Todos los registros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Roles</li>
      </ol>

@stop

@section('content')

<!-- /.box -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Listado de Roles</h3>
    <a class="btn btn-primary pull-right" 
        href="{{ route('admin.roles.create') }}"> 
            <i class="fa fa-plus"></i> Registrar Rol
    </a>
	</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="roles-table" class="table table-bordered table-striped">
				<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Identificador</th>
	                  <th>Nombre</th>
                    <th>Permisos</th>
	                  <th>Acciones</th>
	                </tr>
               	</thead>
               	<tbody>
               		@foreach($roles as $role)
               			<tr>
               				<td>{{ $role->id }}</td>
               				<td>{{ $role->name }}</td>
               				<td>{{ $role->display_name }}</td>
                      <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
               				<td>
                        <!-- Botón para ver role -->
                        <a 
                          href="{{ route('admin.roles.show',$role) }}" 
                          class="btn btn-xs btn-default">
                          <i class="fa fa-eye"></i>
                        </a>
                        <!-- /Botón para ver role -->

                        <!-- Botón para editar role -->
               					<a 
                          href="{{ route('admin.roles.edit',$role) }}" 
                          class="btn btn-xs btn-info">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <!-- /Botón para editar role -->

                        <!-- Botón para eliminar role -->
                        <form 
                            action="{{ route('admin.roles.destroy', $role) }}" 
                            method="POST" 
                            style="display: inline;">
                          {{ csrf_field() }} {{ method_field('DELETE') }}
                 					<button  
                            class="btn btn-xs btn-danger"
                            onclick="return confirm('¿Eliminar registro?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        <!-- /Botón para eliminar post -->
               				</td>
               			</tr>
               		@endforeach
               	</tbody>
            </table>
        </div>
       <!-- /.box-body -->
</div>
<!-- /.box -->

@stop

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>


<script>
  $(function () {
    $('#roles-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


@endpush