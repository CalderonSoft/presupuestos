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
					<th>Fecha</th>
					<th>Categoría</th>
					<th>Item</th>
					<th>Descripción</th>
					<th>Ingresos</th>
					<th>Egresos</th>
				</thead>
				<tbody>
					@foreach($values as $value)
					<tr>
						<td>
							{{$value->date}}
						</td>
						<td>
							{{$value->category}}
						</td>
						<td>
							{{$value->item}}
						</td>
						<td>
							{{$value->description}}
						</td>
						@if($value->category_class == "Ingreso")
						<td>
							{{$value->amount}}
						</td>
						<td></td>
						@else
						<td></td>
						<td>
							{{$value->amount}}
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>			
		</div>
	</div>
@endsection