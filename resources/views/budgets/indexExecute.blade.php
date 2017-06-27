@extends ('layouts.app')

@section('class')
	Mis Presupuestos
@endsection

@section('action')
	| Ejecución
@endsection

@section('content')
	<div class="login-box-body">
	@if($budgets->isempty())
		<h2 style="text-align: center; margin-top: 100px; min-height: 200px;">
			<b>¡No tienes Presupuestos!</b>
			<br>
			<small>
				Crea tu primer presupuesto.
			</small>
		</h2>
	@endif
		<!-- <div class="row"> -->
		<div class="row">
			@foreach($budgets as $budget)
				<div class="col-md-12">
				    <table>
						<tr>
							<td style="font-size: 2em;">
								<a href="" data-toggle="tooltip" title="{{$budget->description}}">
									{{$budget->name}}
						      	</a>
							</td>
							<td width="10%">
								<a href="{{route('budgets_execute', ['budget' => $budget->id])}}" class="btn btn-success" style="margin-right: 10px">Registrar movimiento</a>
							</td>
						</tr>
					</table>
					<hr>
				</div>
			@endforeach
		</div>
	</div>
@endsection
