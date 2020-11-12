@extends('admin.layout')

@section('header')

      <h1>
        Permisos
        <small>Todos los registros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Permisos</li>
      </ol>

@stop

@section('content')

<!-- /.box -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Listado de Permisos</h3>
	</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="roles-table" class="table table-bordered table-striped">
				<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Identificador</th>
	                  <th>Nombre</th>
	                  <th>Acciones</th>
	                </tr>
               	</thead>
               	<tbody>
               		@foreach($permissions as $permission)
               			<tr>
               				<td>{{ $permission->id }}</td>
               				<td>{{ $permission->name }}</td>
               				<td>{{ $permission->display_name }}</td>
               				<td>
                        <!-- Botón para editar permission -->
               					<a 
                          href="{{ route('admin.permissions.edit',$permission) }}" 
                          class="btn btn-xs btn-info">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <!-- /Botón para editar permission -->
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
    $('#permissions-table').DataTable({
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