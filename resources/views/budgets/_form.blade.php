@if($budget->exist)
	<form action="{{ route('budgets.update'), ['budget' => $budget->id] }}" method="POST">
	{{method_field('PUT')}}
@else
	<form action="{{ route('budgets.store') }}" method="POST">
@endif

{{ csrf_field() }}
	<div class="login-box-body">
		<!-- Title field -->
		<div class="form-group">
			<label for="title">Nombre</label>
			<input type="text" name="title" class="form-control" value="{{$post->title or old('title')}}"/>
		</div>
		<!-- Description Input -->
		<div class="form-group">
			<label for="description">Descripción</label>
			<textarea rows="5" name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</div>

</form>