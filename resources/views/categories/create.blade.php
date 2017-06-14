@extends('layouts.app')

@section('content')

		<form action="{{ route('categories.store') }}" method="POST">

		{{ csrf_field() }}
		<div class="login-box-body">
			<input type="hidden" name="budget_id" value="{{$budget->id}}">
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
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>

	</form>
@endsection