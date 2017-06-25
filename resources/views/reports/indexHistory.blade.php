@extends ('layouts._index')

@section('reportName')
	| Historial de Movimientos
@endsection

@section('list')
	@foreach($budgets as $budget)
		  <div class="col-md-12">
		    <h2>
		      <a href="{{route('reports_history', ['budget' => $budget->id])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>
		    </h2>
				<hr>
		  </div>
	@endforeach
@endsection

