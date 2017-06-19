@extends('layouts.app')

@section('class')
	Item
@endsection

@section('action')
	| Editar
@endsection

@section('content')
	 <div class="login-box-body">
			<form id="editItem" action="" method="POST">
			{{method_field('PUT')}}

		{{ csrf_field() }}

				<input type="hidden" name="category_id" value="{{$item->category_id}}">
				<!-- Description field -->
				<div class="form-group">
					<label for="description">Descripción</label>
					<input type="text" name="description" class="form-control" value="{{$item->description or old('description')}}"/>
				</div>

	            <small class="pull-right">
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Guardar" />
				</div>
				</small>
		</form>
		<small class="pull-right" style="margin-right: 15px">
		<form id="deleteItem" action="" method="POST">
	    {{ csrf_field() }}
	    {{ method_field('DELETE') }}
	    <input type="submit" class="btn btn-default" value="Eliminar" />
		</form>
		</small>
		<small class="pull-right" style="margin-right: 15px">
		<a href="" class="btn btn-default" onclick="history.back()">Volver</a>
		</small>
		<br>
		<br>
		<hr>
		@if($values->isNotEmpty())
			@include('values._edit')
		@else
			@include('values._insert')
		@endif
</div>
@endsection
