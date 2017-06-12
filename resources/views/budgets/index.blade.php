@extends ('layouts.app')

@section('content')
	
	@foreach($budgets as $budget)
		<div class="row">
			<div class="col-md-12">
				<h2><a href="#"> {{$budget->name}}</a>
				</h2>
			</div>
		</div>
		<hr>
	@endforeach	
	
@endsection