@extends ('layouts.app')

@section('content')
	
	@foreach($budgets as $budget)	
		<div class="row">
		  <div class="col-md-12">
		    <h2>
		      <a href="{{route('budgets.show', ['budget' => $budget->id])}}">{{$budget->name}}</a>

			<small class="pull-right">
				<table>
					<tr>	
						<td>
							<a href="{{route('budgets.edit', ['budget' => $budget->id])}}" class="btn btn-primary" style="margin-right: 10px">Editar</a>
						</td>					
						<td>
							<form  action="{{route('budgets.destroy', ['budget' => $budget->id])}}" method="POST">
				            {{ csrf_field() }}
				            {{ method_field('DELETE') }}
				            <button type="submit" class="btn btn-warning">Eliminar</button>
				        	</form>
						</td>						
					</tr>
				</table>
	      	</small>
		    </h2>
		    
		  </div>
		</div>
	@endforeach	
	
@endsection