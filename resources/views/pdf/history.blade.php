<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Historial de Movimientos</title>
    <style type="text/css">
    	th {
    		background-color: #447BD4;
    		color: white;
    		text-align: center;
    	}

    	.header{
			background-color: #447BD4;
			color: white;
			font-size: 2em;
			font-weight: bolder;
			text-align: right;
			padding: 15px;
    	}
    </style>
  </head>
  <body>
  	<div class="header">
  		Reporte Historial de Movimientos
  	</div>
	<div>
		<h2>
			<b>{{$budget->name}}</b>
		</h2>
		<p>{{$budget->description}}</p>
	</div>
		<table>
			<thead>
			<tr>
				<th style="width: 90px;">Fecha</th>
				<th style="min-width: 90px;">Categoría</th>
				<th style="min-width: 90px;">Item</th>
				<th>Descripción</th>
				<th style=" width: 110px;">Ingresos</th>
				<th style=" width: 110px;">Egresos</th>
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
				<tr style="font-weight: bold;">
					<td colspan="4" style="text-align: right;">
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
				<tr style="font-weight: bold; font-size: 1.5em;">
					<td colspan="4" style="text-align: right;">
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