@extends('layouts.app')

@section('class')
	Item
@endsection

@section('action')
	| Editar
@endsection

@section('content')
	 <div class="login-box-body">
			<form id="editItem" action="{{route('items.update', ['item' => $item->id])}}" method="POST">
			{{method_field('PUT')}}

		{{ csrf_field() }}
				<input type="hidden" name="budgetYear" value="{{$year}}">
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
		<a href="" class="btn btn-default" onclick="history.back()">Volver</a>
		</small>
		<br>
		<br>
		<hr>
		@if($values->isNotEmpty())
			<!-- Hay algo -->
			@include('values._edit')
		@else
			<!-- No hay nada -->
			@include('values._insert')
		@endif
</div>
@endsection
