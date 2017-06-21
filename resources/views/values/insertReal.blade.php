@extends('layouts.app')

@section('class')
	Nuevo movimiento
@endsection

@section('content')
	<div  class="login-box-body">
		<table class="table">
			<tr>
				@if($category->class == "Ingreso")
				<td class="success" style="font-size: 1.5em; width: 120px; text-align: center;">
					<b>INGRESO</b>
				</td>
				@else
				<td class="danger" style="font-size: 1.5em; width: 120px; text-align: center;">
					<b>EGRESO</b>
				</td>
				@endif
				<td style="font-size: 1.3em; vertical-align: middle;">
					| {{$item->description}}
				</td>
			</tr>
		</table>
		<hr>
		<form action="{{route('values_storeReal')}}" method="POST">
		{{ csrf_field() }}
			<input type="hidden" name="item_id" value="{{$item->id}}">
			<!-- Description Input -->
			<div class="form-group">
				<label for="description" style="font-size: 1.3em;">Descripción</label>
				<textarea rows="5" name="description" class="form-control">{{old('description')}}</textarea>
			</div>
			<!-- Amount field -->
			<div class="form-group" style="text-align: center;">
				<label for="amount" style="font-size: 2em;">$</label>
				<input type="text" name="amount" class="form-control text-center" value="{{old('amount')}}" 
				style="
					width: 30%; 
					display: inline-block; 
					font-size: 2em; 
					text-align: right;
					height: 55px;" />
			</div>

			<div class="form-group pull-right">
				<button type="submit" class="btn btn-primary btn-lg">Guardar</button>
			</div>
			<br>
			<br>
			<br>
		</form>
	</div>
@endsection