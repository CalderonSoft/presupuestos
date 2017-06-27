@extends('layouts.app')

@section('class')
	Reportes
@endsection

@section('action')
	| Planeado Vs Ejecutado
	<div class="pull-right">
		<a href="{{route('pdfs_plannedExecuted', ['budget' => $budget->id, 'year' => $year, 'month' => $month])}}" class="btn btn-info" style="margin-right: 10px">Generar PDF</a>
	</div>
@endsection

@section('content')
	<br>
	<div class="login-box-body">
		<div style="font-size: 2em;">
			<b>{{$budget->name}}</b>
		</div>
		<p>{{$budget->description}}</p>	
		<hr>
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
				<th style="text-align: center;">
					Diferencia
				</th>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr
				
				>
					<!-- Nombre de la Categoría -->
					<td style=""
					@if($category->class == "Ingreso")
						@php
							$category_type= 1;
						@endphp
						class="success"
					@else
						@php
							$category_type= 2;
						@endphp
						class="danger"
					@endif
					>
						<h4 class="inline"><b>{{$category->name}}</b></h4>
					</td>
					<td class="" width="140px">
					</td>
					<td class="" width="140px">
					</td>
					<td class="" width="140px">
					</td>
				</tr>
				@foreach($items as $item)
							@if($item->category_id == $category->id)
								<tr>
								<!-- Descripción del item -->
									<td style="padding-left: 20px;">
										{{$item->description}}
									</td>			
									@php
										$planned = 0;
										$real = 0;
									@endphp						
									<td style="text-align: right;">
										@foreach($pValues as $pValue)
											@if($pValue->item_id == $item->id)
												${{number_format($pValue->planned_value, 0, ",", ".")}}
													@php
														$planned = $pValue->planned_value
													@endphp
												@break
											@endif
										@endforeach
									</td>
									<td style="text-align: right;">
										@foreach($rValues as $rValue)
											@if($rValue->item_id == $item->id)
												${{number_format($rValue->real_value, 0, ",", ".")}}
													@php
														$real = $rValue->real_value
													@endphp
												@break
											@endif
										@endforeach
									</td>
									@php
										if($category_type == 1) {
											$difference = $real - $planned;
										}
										else {
											$difference = $planned - $real;
										}										
									@endphp
									<td style="text-align: right;" 
									@if($difference < 0)
										class="danger"
									@else
										class="success"
									@endif
									>					
										${{number_format($difference, 0, ",", ".")}}
									</td>
								</tr>
							@endif
				@endforeach
			@endforeach
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr class="info">
					<td style="text-align: right;">
						<b>TOTALES</b> <span class="glyphicon glyphicon-arrow-right"></span>
					</td>
					<td style="text-align: right;">
						${{number_format($pValues->sum('planned_value'), 0, ",", ".")}}
					</td>
					<td style="text-align: right;">
						${{number_format($rValues->sum('real_value'))}}
					</td>
					<td style="text-align: right;"
					@if($pValues->sum('planned_value') - $rValues->sum('real_value') < 0)
						class="danger"
					@else
						class="success"
					@endif
					>
						<b>${{number_format($pValues->sum('planned_value') - $rValues->sum('real_value'), 0, ",", ".")}}</b>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection