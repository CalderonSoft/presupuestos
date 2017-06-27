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
    </style>
  </head>
  <body>
  	<div class="header">
  		Reporte Historial de Movimientos
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
				<th style="width: 90px;">Fecha</th>
				<th style="min-width: 90px;">Categoría</th>
				<th style="min-width: 90px;">Item</th>
				<th>Descripción</th>
				<th style=" width: 120px;">Ingresos</th>
				<th style=" width: 120px;">Egresos</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$ingresos = 0;
				$egresos = 0;
				?>
				@foreach($values as $value)
				<tr>
					<!-- Fecha del movimiento -->
					<td>
						{{$value->date}}
					</td>
					<!-- Categoría -->
					<td>
						{{$value->category}}
					</td>
					<!-- Item -->
					<td>
						{{$value->item}}
					</td>
					<!-- Descripción del movimiento -->
					<td>
						{{$value->description}}
					</td>
					@if($value->category_class == "Ingreso")
					<!-- Ingresos -->
					<td style="text-align: right;">
						${{number_format($value->amount, 0, ",", ".")}}
						<?php
						$ingresos += $value->amount;
						?>
					</td>
					<td></td>
					@else
					<!-- Egresos -->
					<td></td>
					<td style="text-align: right;">
						${{number_format($value->amount, 0, ",", ".")}}
						<?php
						$egresos += $value->amount;
						?>
					</td>
					@endif
				</tr>
				@endforeach
				<tr class="totales-row">
					<td colspan="4" class="totales-title">
						Subtotales
					</td>
					<!-- Total Ingresos -->
					<td style="text-align: right;" class="success">
						${{number_format($ingresos, 0, ",", ".")}}
					</td>
					<!-- Total Egresos -->
					<td style="text-align: right;" class="danger">
						${{number_format($egresos, 0, ",", ".")}}
					</td>
				</tr>
				<tr>
					<td colspan="6">

					</td>
				</tr>
				<tr class="totales-row total-row">
					<td colspan="4" class="totales-title">
						TOTAL
					</td>
					<td style="text-align: center;" class="info" colspan="2">
						${{number_format(($ingresos - $egresos), 0, ",", ".")}}
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>