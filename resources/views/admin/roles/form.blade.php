{{ csrf_field() }}		

<div class="form-group">
	<label for="name">Identificador:</label>
	@if($role->exists)
		<input value="{{ $role->name }}" class="form-control" disabled>
	@else
		<input value="{{ old('name', $role->name) }}" name="name" class="form-control">
	@endif
</div>

<div class="form-group">
	<label for="display_name">Nombre:</label>
	<input type="text" name="display_name" value="{{ old('display_name', $role->display_name ) }}" class="form-control">
</div>
<!-- Guard
<div class="form-group">
	<label for="guard_name">Guard:</label>
	<select name="guard_name" class="form-control" name="guard_name">
		{{-- @foreach(config('auth.guards') as $guardName => $guard)
			<option 
				{{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }}
				value="{{ $guardName }}">{{ $guardName }}
			</option>
		@endforeach
		--}}
	</select>
</div>
-->
<div class="form-group col-md-6">
	<label>Permisos</label>
	@include('admin.permissions.checkboxes', ['model' => $role])
</div>

<button class="btn btn-primary btn-block">Actualizar rol</button>