@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
		<small class="pull-right">
        	<a href="#" class="btn btn-primary">Agregar Categoría</a>
        	</form>

      	</small>
	</h1>
	<p>{{$budget->description}}</p>
@endsection