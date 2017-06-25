@extends('layouts.app')

@section('class')
	Reportes
@endsection

@section('action')
	| Planeado Vs Ejecutado
@endsection

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		<table class="table">
			<thead>
				<th width="" style="">
					<form class="form-inline" action="{{route('reports_month')}}" method="POST" style="font-size: 1.2em;">
					{{csrf_field()}}
						<input type="hidden" name="budget_id" value="{{$budget->id}}">
						<label for="budgetYear"><b>Año </b></label>
						<select class="form-control" name="budgetYear">
							@for($i = 0 ; $i < 5 ; $i++)
							<option value="{{date("Y") + $i}}"
							@if($year != null)
								@if($year == (date("Y") + $i))
									selected="true"
								@endif
							@endif
							>{{date("Y") + $i}}</option>
							@endfor
						</select>
						<label for="budgetMonth"><b> | Mes </b></label>
						<select class="form-control" name="budgetMonth">
							<option value="0"
							@if($month == 0)
								selected="true"
							@endif 
							>Ene - Dic</option>
							<option value="1"
							@if($month == 1)
								selected="true"
							@endif 
							>Enero</option>
							<option value="2"
							@if($month == 2)
								selected="true"
							@endif 
							>Febrero</option>
							<option value="3"
							@if($month == 3)
								selected="true"
							@endif 
							>Marzo</option>
							<option value="4"
							@if($month == 4)
								selected="true"
							@endif 
							>Abril</option>
							<option value="5"
							@if($month == 5)
								selected="true"
							@endif 
							>Mayo</option>
							<option value="6"
							@if($month == 6)
								selected="true"
							@endif 
							>Junio</option>
							<option value="7"
							@if($month == 7)
								selected="true"
							@endif 
							>Julio</option>
							<option value="8"
							@if($month == 8)
								selected="true"
							@endif 
							>Agosto</option>
							<option value="9"
							@if($month == 9)
								selected="true"
							@endif 
							>Septiembre</option>
							<option value="10"
							@if($month == 10)
								selected="true"
							@endif 
							>Octubre</option>
							<option value="11"
							@if($month == 11)
								selected="true"
							@endif 
							>Noviembre</option>
							<option value="12"
							@if($month == 12)
								selected="true"
							@endif 
							>Diciembre</option>
						</select>
						<button type="submit" name="button" class="btn btn-info glyphicon glyphicon-refresh"></button>
					</form>
				</th>
				<th style="text-align: center;">
					Valor Planeado
				</th>
				<th style="text-align: center;">
					Valor Real
				</th>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<!-- Nombre de la Categoría -->
					<td colspan="13" style="">
						<h4 class="inline"><b>{{$category->name}}</b></h4>
					</td>
					<td>
					</td>
				</tr>
				@foreach($items as $item)
							@if($item->category_id == $category->id)
								<tr>
								<!-- Descripción del item -->
									<td style="padding-left: 20px;">
										{{$item->description}}
									</td>
									<td></td>
									<td></td>
								</tr>
							@endif
				@endforeach
			@endforeach
			</tbody>
		</table>
	</div>
@endsection