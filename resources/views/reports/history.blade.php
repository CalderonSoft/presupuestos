@extends ('layouts.app')

@section('class')
	Reportes
@endsection

@section('action')
	| Historial de movimientos
@endsection

@section('content')
	<div class="pull-left">
	<h1>
		<b>{{$budget->name}}</b>
	</h1>
	<p>{{$budget->description}}</p>
	</div>
	<br>
	<br>
	<div class="pull-right">
		<a href="{{route('pdfs_history', ['budget' => $budget->id])}}" class="btn btn-info" style="margin-right: 10px">Generar PDF</a>
		<a href="{{route('budgets_execute', ['budget' => $budget->id])}}" class="btn btn-success" style="margin-right: 10px">Registrar movimiento</a>
	</div>
	<br>
	<br>
	<br>
	<div class="login-box-body">
	@if($values->isempty())
		<h2 style="text-align: center; margin-top: 100px; min-height: 200px;">
			<b>¡El presupuesto no tiene valores registrados!</b>
			<br>
			<small>
				Comienza a administrar tu presupuesto ahora mismo...
			</small>
		</h2>
	@endif
		<!-- <div class="row"> -->
		<div class="row">
			<table class="table">
				<thead>
					<th style="min-width: 90px; text-align: center;">Fecha</th>
					<th style="min-width: 90px; text-align: center;">Categoría</th>
					<th style="min-width: 90px; text-align: center;">Item</th>
					<th style="text-align: center;">Descripción</th>
					<th style="text-align: center; width: 110px;">Ingresos</th>
					<th style="text-align: center; width: 110px;">Egresos</th>
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
							Subtotales <span class="glyphicon glyphicon-arrow-right"></span>
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
							TOTAL <span class="glyphicon glyphicon-arrow-right"></span>
						</td>
						<td style="text-align: center;" class="info" colspan="2">
							${{number_format(($ingresos - $egresos), 0, ",", ".")}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
