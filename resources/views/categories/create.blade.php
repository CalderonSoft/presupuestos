@extends('layouts.app')

@if($category->exists)
	<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
	{{method_field('PUT')}}
@else
	<form action="{{ route('categories.store') }}" method="POST">
@endif

{{ csrf_field() }}
	<div class="login-box-body">
		<!-- Title field -->
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{$category->name or old('name')}}"/>
		</div>
		<!-- Description Input -->
		<div class="form-group">
			<label for="class">Clase</label>
			<textarea rows="5" name="class" class="form-control">{{$category->class or old('class')}}</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</div>

</form>