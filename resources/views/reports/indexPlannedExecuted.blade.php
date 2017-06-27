@extends ('layouts._index')

@section('reportName')
	| Planeado Vs Ejecutado
@endsection

@section('list')
	@foreach($budgets as $budget)
		  <div class="col-md-12">
		    <div style="font-size: 2em;">
		      <a href="{{route('reports_plannedExecuted', ['budget' => $budget->id, 'year' => date('Y'), 'month' => 0])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>
		    </div>
				<hr>
		  </div>
	@endforeach
@endsection

