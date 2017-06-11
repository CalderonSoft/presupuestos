@if($budget->exist)
	<form action="{{ route('budgets.update'), ['budget' => $budget->id] }}" method="POST">
	{{method_field('PUT')}}
@else
	<form action="{{ route('budgets.store') }}" method="POST">
@endif

{{ csrf_field() }}

	<!-- Title field -->
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" name="title" class="form-control" value="{{$post->title or old('title')}}"/>
	</div>
	<!-- Description Input -->
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea rows="5" name="description" class="form-control"></textarea>
	</div>
	<!-- Url field -->
	<div class="form-group">
		<label for="url">Url:</label>
		<input type="text" name="url" class="form-control" value=""/>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Save Post</button>
	</div>

</form>