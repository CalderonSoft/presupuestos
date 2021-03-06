@if($budget->exists)
	<form action="{{ route('budgets.update', ['budget' => $budget->id]) }}" method="POST">
	{{method_field('PUT')}}
@else
	<form action="{{ route('budgets.store') }}" method="POST">
@endif

{{ csrf_field() }}
	<div class="login-box-body">
		<!-- Title field -->
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{$budget->name or old('name')}}"/>
		</div>
		<!-- Description Input -->
		<div class="form-group">
			<label for="description">Descripción</label>
			<textarea rows="5" name="description" class="form-control">{{$budget->description or old('description')}}</textarea>
		</div>

		<div class="form-group pull-right">
			<button type="submit" class="btn btn-primary btn-lg">Guardar</button>
		</div>
		<br>
		<br>
	</div>

</form>