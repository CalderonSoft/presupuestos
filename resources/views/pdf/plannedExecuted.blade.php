<html>
  	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <title>Reporte Historial de Movimientos</title>
	    <style type="text/css">
	    	body {
	    		font-family: sans-serif;
	    	}

		    th {
				background-color: #447BD4;
				color: white;
				text-align: center;
				padding: 5px;
	    	}

	    	.header{
				background-color: #447BD4;
				color: white;
				font-size: 1.5em;
				font-weight: bolder;
				text-align: right;
				padding: 15px;
	    	}
	    	.period{
	    		font-weight: normal;
	    		text-align: left;
	    		display: inline;
	    		float: left;
	    	}
	    	.budget{
	    		font-size: 1.3em;
	    		margin-top: 15px;
	    	}
	    	.totales-row{
	    		font-weight: bold;
	    	}
	    	.total-row{
	    		font-size: 1.5em;
	    	}
	    	.totales-title{
	    		text-align: right;
	    		padding-right: 10px;
	    	}
	    	.success{
	    		background-color: #dff0d8;
	    	}
	    	.info{
	    		background-color: #d9edf7;
	    	}
	    	.danger{
	    		background-color: #f2dede;
	    	}
	    	.category{
	    		padding: 5px;
	    		font-size: 1.2em;
	    	}
	    </style>
  	</head>
  	<body>
	  	<div class="header">
	  		<div class="period">
	  			@if($month == 0)
					Ene - Dic
				@endif
				@if($month == 1)
					Enero
				@endif
				@if($month == 2)
					Febrero
				@endif
				@if($month == 3)
					Marzo
				@endif
				@if($month == 4)
					Abril
				@endif
				@if($month == 5)
					Mayo
				@endif
				@if($month == 6)
					Junio
				@endif
				@if($month == 7)
					Julio
				@endif
				@if($month == 8)
					Agosto
				@endif
				@if($month == 9)
					Septiembre
				@endif
				@if($month == 10)
					Octubre
				@endif
				@if($month == 11)
					Noviembre
				@endif
				@if($month == 12)
					Diciembre
				@endif
				de {{$year}}
	  		</div>
	  		Reporte de valores Planeados Vs Ejecutados
	  	</div>
		<div>
			<div class="budget">
				<b>{{$budget->name}}</b>				
			</div>
				{{$budget->description}}
		</div>
		<table width="100%">
			<thead>
				<tr>
					<th>
						
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
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr
				
				>
					<!-- Nombre de la Categoría -->
					<td 
					@if($category->class == "Ingreso")
						@php
							$category_type= 1;
						@endphp
						class="success category"
					@else
						@php
							$category_type= 2;
						@endphp
						class="danger category"
					@endif
					>
						<b>{{$category->name}}</b>
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
	</body>
</html>