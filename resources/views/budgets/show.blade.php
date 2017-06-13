@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
		<small class="pull-right">
        	<a href="{{route('categories_create', ['budget' => $budget->id])}}" class="btn btn-primary">Agregar Categoría</a>
        	</form>

      	</small>
	</h1>
	<p>{{$budget->description}}</p>
	<div>
	<ul>
		@foreach($categories as $category)
			<li>
				{{$category->name}}
			</li>
		@endforeach
	</ul>
	</div>
@endsection