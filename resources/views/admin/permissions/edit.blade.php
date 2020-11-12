@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Editar permiso</h3>
			</div>
			<div class="box-body">
				
				@include('partials.error-messages')

				<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
				{{ csrf_field() }}{{ method_field('PUT') }}

					<div class="form-group">
						<label for="name">Identificador:</label>
						<input 
							type="text" 
							value="{{ $permission->name }}" 
							class="form-control" 
							disabled>
					</div>

					
					<div class="form-group">
						<label for="display_name">Nombre:</label>
						<input type="text" name="display_name" value="{{ old('display_name', $permission->display_name ) }}" class="form-control">
					</div>

					<button class="btn btn-primary btn-block">Actualizar permiso</button>
				</form>
			</div>
		</div>
	</div>
</div>	

@endsection