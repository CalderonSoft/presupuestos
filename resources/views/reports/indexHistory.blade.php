@extends ('layouts._index')

@section('reportName')
	| Historial de Movimientos
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
@endsection

