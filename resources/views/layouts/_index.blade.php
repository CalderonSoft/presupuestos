@extends ('layouts.app')

@section('class')
	Mis Presupuestos
@endsection

@section('action')
	| Reportes @yield('reportName')
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
			@yield('list')
		</div>
	</div>
@endsection