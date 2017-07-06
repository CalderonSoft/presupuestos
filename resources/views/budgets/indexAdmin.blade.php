@extends ('layouts._index')

@section('title')
	Presupuestos
@endsection

@section('subtitle')
	| Administración
@endsection

@section('list')	
	<div class="col-md-12">
	  	<table class="table">
	  		<thead>
	  			<tr>
	  				<th>Presupuesto</th>
	  				<th width="300px">Propietario</th>
	  				<th width="100px"></th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  		@foreach($budgets as $budget)
	  			<tr>
	  				<td>
	  					{{$budget->name}}
	  				</td>
	  				<td>
	  					{{$budget->user}}
	  				</td>
	  				<td>
	  					<a href="{{route('budgets_editOwner', ['budget' => $budget->id])}}" class="btn btn-default">
	  						Reasignar
	  					</a>
	  				</td>
	  			</tr>
	  		@endforeach
	  		</tbody>
	  	</table>
	  	<hr>
	</div>	
	<div class="pull-right" style="margin-right: 20px;">
		{{$budgets->links()}}
	</div>	
@endsection

