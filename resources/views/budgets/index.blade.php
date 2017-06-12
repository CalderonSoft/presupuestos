@extends ('layouts.app')

@section('content')
	
	@foreach($budgets as $budget)	
		<div class="row">
		  <div class="col-md-12">
		    <h2>
		      <a href="#">{{$budget->name}}</a>

			<small class="pull-right">
	        	<a href="{{route('budgets.edit', ['budget' => $budget->id])}}" class="btn btn-info">Edit</a>
	        	<form  action="{{route('budgets.destroy', ['budget' => $budget->id])}}" method="POST">
	            {{ csrf_field() }}
	            {{ method_field('DELETE') }}
	            <button type="submit" class="btn btn-danger">Delete</button>
	        	</form>

	      	</small>
		    </h2>
		    
		  </div>
		</div>
	@endforeach	
	
@endsection