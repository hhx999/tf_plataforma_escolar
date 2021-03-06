@extends('admin.layout')

@section('header')

      <h1>
        Docentes
        <small>Todos los registros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Docentes</li>
      </ol>

@stop

@section('content')

<!-- /.box -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Listado de Docentes</h3>
    <!-- Botón para registrar docente -->
    @can('create', $users->first()) 
      <a class="btn btn-primary pull-right" 
          href="{{ route('admin.users.create') }}"> 
              <i class="fa fa-plus"></i> Registrar docente
      </a>
    @endcan
    <!-- /Botón para registrar docente -->
	</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="users-table" class="table table-bordered table-striped">
				<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Nombre</th>
	                  <th>Email</th>
                    <th>Roles</th>
	                  <th>Acciones</th>
	                </tr>
               	</thead>
               	<tbody>
               		@foreach($users as $user)
               			<tr>
               				<td>{{ $user->id }}</td>
               				<td>{{ $user->name }}</td>
               				<td>{{ $user->email }}</td>
                      <td>{{ $user->getRoleNames()->implode(', ') }}</td>
               				<td>
                        <!-- Botón para ver user -->
                        @can('view', $user)
                          <a 
                            href="{{ route('admin.users.show',$user) }}" 
                            class="btn btn-xs btn-default">
                            <i class="fa fa-eye"></i>
                          </a>
                        @endcan
                        <!-- /Botón para ver user -->

                        <!-- Botón para editar user -->
                        @can('update', $user)
                 					<a 
                            href="{{ route('admin.users.edit',$user) }}" 
                            class="btn btn-xs btn-info">
                            <i class="fa fa-pencil"></i>
                          </a>
                        @endcan
                        <!-- /Botón para editar user -->

                        <!-- Botón para eliminar user -->
                        @can('delete', $user)
                          <form 
                              action="{{ route('admin.users.destroy', $user) }}" 
                              method="POST" 
                              style="display: inline;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                   					<button  
                              class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Eliminar registro?')">
                              <i class="fa fa-times"></i>
                            </button>
                          </form>
                        @endcan
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
    $('#users-table').DataTable({
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