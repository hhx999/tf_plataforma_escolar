@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Datos personales</h3>
			</div>
			<div class="box-body">
				@if($errors->any())
					<ul class="list-group">
						@foreach($errors->all() as $error)
							<li class="list-group-item list-group-item-danger">
								{{ $error }}
							</li>
						@endforeach
					</ul>
				@endif
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
				{{ csrf_field() }} {{ method_field('PUT') }}
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" name="password" class="form-control" placeholder="Contraseña">
						
						<span class="help-block">Dejar campos vacíos para no modificar la contraseña</span>

						<label for="password_confirmation">Repetir la contraseña:</label>
						<input type="password" name="password_confirmation" class="form-control" placeholder="Repetir contraseña">
					</div>
					<button class="btn btn-primary btn-block">Actualizar usuario</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>
			</div>
			<div class="box-body">
				<form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
					{{ csrf_field() }} {{ method_field('PUT') }}
					
					@include('admin.roles.checkboxes')
					
					<button class="btn btn-primary btn-block">Actualizar roles</button>
				</form>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permisos</h3>
			</div>
			<div class="box-body">
				<form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
					{{ csrf_field() }} {{ method_field('PUT') }}
					
					@include('admin.permissions.checkboxes
					')
					<button class="btn btn-primary btn-block">Actualizar permisos</button>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection