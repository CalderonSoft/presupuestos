@extends('layouts.app')

@section('content')

	@if($category->exists)
		<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
		{{method_field('PUT')}}
	@else
		<form action="{{ route('categories.store') }}" method="POST">
	@endif

	{{ csrf_field() }}
		<div class="login-box-body">
			<input type="hidden" name="category_id" value="{{$category->id}}">
			<!-- Name field -->
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" name="name" class="form-control" value="{{$category->name or old('name')}}"/>
			</div>
			<!-- Class -->
			<div class="form-group has-feedback">
              <!-- <label>Género:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                  <input type="radio" name="class" class="radio-inline" value="Ingreso" checked="checked"> Ingreso &nbsp;&nbsp;
                  <input type="radio" name="class" class="radio-inline" value="Egreso"> Egreso
          </div>

			<div class="form-group">
				<tr>
				<td><button type="submit" class="btn btn-primary">Editar y Guardar</button></td>
				<td>
					<form  action="{{route('categories.destroy', ['category' => $category->id])}}" method="POST">
		            {{ csrf_field() }}
		            {{ method_field('DELETE') }}
		            <button type="submit" class="btn btn-danger">Eliminar</button>
		        	</form>
				</td>
				</tr>
			</div>
		</div>

	</form>
@endsection