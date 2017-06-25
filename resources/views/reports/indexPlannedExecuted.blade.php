@extends ('layouts._index')

@section('reportName')
	| Planeado Vs Ejecutado
@endsection

@section('list')
	@foreach($budgets as $budget)
		  <div class="col-md-12">
		    <h2>
		      <a href="{{route('reports_plannedExecuted', ['budget' => $budget->id, 'year' => date('Y'), 'month' => 0])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>
		    </h2>
				<hr>
		  </div>
	@endforeach
@endsection

