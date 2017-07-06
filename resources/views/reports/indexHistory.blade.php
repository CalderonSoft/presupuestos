@extends ('layouts._index')

@section('title')
	Mis Presupuestos
@endsection

@section('subtitle')
	| Reportes | Historial de Movimientos
@endsection

@section('list')
	@foreach($budgets as $budget)
		  <div class="col-md-12">
		    <div style="font-size: 2em;">
		      <a href="{{route('reports_history', ['budget' => $budget->id])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>
		    </div>
				<hr>
		  </div>
	@endforeach
	@if(Auth::user()->role != 2)
	<div class="pull-right">
		{{$budgets->links()}}
	</div>
	@endif
@endsection

