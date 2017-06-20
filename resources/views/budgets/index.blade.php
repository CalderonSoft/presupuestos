@extends ('layouts.app')

@section('class')
	Mis Presupuestos
@endsection

@section('action')
	| Planeación
@endsection

@section('content')
	<div class="login-box-body">
	@if($budgets->isempty())
		<h2 style="text-align: center; margin-top: 100px; min-height: 200px;">
			<b>¡No tienes Presupuestos!</b>
			<br>
			<small>
				Crea tu primer presupuesto presionando el botón azul.
			</small>
		</h2>
	@endif
		<!-- <div class="row"> -->
		<div class="row">
			@foreach($budgets as $budget)
				  <div class="col-md-12">
				    <h2>		    
				      <a href="{{route('budgets_show', ['budget' => $budget->id, 'year' => date('Y')])}}" data-toggle="tooltip" title="{{$budget->description}}">{{$budget->name}}</a>

					<small class="pull-right">
						<table>
							<tr>
								<td>
									<a href="{{route('budgets.edit', ['budget' => $budget->id])}}" class="btn btn-default" style="margin-right: 10px">Editar</a>
								</td>
								<td>
									<form  action="{{route('budgets.destroy', ['budget' => $budget->id])}}" method="POST">
						            {{ csrf_field() }}
						            {{ method_field('DELETE') }}
						            <button type="submit" class="btn btn-default">Eliminar</button>
						        	</form>
								</td>
							</tr>
						</table>
			      	</small>
				    </h2>
						<hr>
				  </div>
			@endforeach
			
			<div class="col-md-3">
				<div
					style="
					position: fixed;
					right: 40px;
					bottom: 30px;
					z-index: 9999;
					">
					<a href="" data-toggle="modal" data-target="#createBudget">
						<img src="{{asset('dist/icons/plus_24.png')}}" data-toggle="tooltip" title="Crea un nuevo Presupuesto">
					</a>
				</div>
				@include('budgets.createModal')
			</div>
		</div>
	</div>
@endsection
