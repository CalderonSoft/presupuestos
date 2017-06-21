@extends ('layouts.app')

@section('class')
	Mis Presupuestos
@endsection

@section('action')
	| Reportes
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
				    <h2>
				      <a href="{{route('reports_history', ['budget' => $budget->id])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>
				    </h2>
						<hr>
				  </div>
			@endforeach
		</div>
	</div>
@endsection
