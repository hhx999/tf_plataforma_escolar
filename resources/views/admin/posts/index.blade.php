@extends('admin.layout')

@section('header')

      <h1>
        POSTS
        <small>Todas las publicaciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>

@stop

@section('content')

<!-- /.box -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Listado de publicaciones</h3>
    <button class="btn btn-primary pull-right" 
            data-toggle="modal" 
            data-target="#myModal"> 
            <i class="fa fa-plus"></i> Crear publicación
    </button>
	</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="posts-table" class="table table-bordered table-striped">
				<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Título</th>
	                  <th>Extracto</th>
	                  <th>Acciones</th>
	                </tr>
               	</thead>
               	<tbody>
               		@foreach($posts as $post)
               			<tr>
               				<td>{{ $post->id }}</td>
               				<td>{{ $post->title }}</td>
               				<td>{{ $post->excerpt }}</td>
               				<td>
                        <!-- Botón para ver post -->
                        <a 
                          href="{{ route('posts.show',$post) }}" 
                          class="btn btn-xs btn-default"
                          target="_blank">
                          <i class="fa fa-eye"></i>
                        </a>
                        <!-- /Botón para ver post -->

                        <!-- Botón para editar post -->
               					<a 
                          href="{{ route('admin.posts.edit',$post) }}" 
                          class="btn btn-xs btn-info">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <!-- /Botón para editar post -->

                        <!-- Botón para eliminar post -->
                        <form 
                            action="{{ route('admin.posts.destroy', $post) }}" 
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
    $('#posts-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


@endpush