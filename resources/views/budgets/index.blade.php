@extends ('layouts.app')

@section('class')
	@if(Auth::user()->role == 2)
	Mis 
	@endif
	Presupuestos
@endsection

@section('action')
	| Planeación
@endsection

@section('content')
	@php
		$authRole = Auth::user()->role;
		$authId = Auth::user()->id;
	@endphp
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
					<table width="100%">
						<tr>
							<td style="font-size: 2em;">
								<a href="{{route('budgets_show', ['budget' => $budget->id, 'year' => date('Y')])}}" data-toggle="tooltip" title="{{$budget->description}}">
									{{$budget->name}}
						      	</a>
							</td>
							@if($authId == $budget->user_id)
								<td width="145px">
									<div class="pull-left">
									<a href="{{route('budgets.edit', ['budget' => $budget->id])}}" class="btn btn-default" style="">Editar</a>
									</div>		
									<div class="pull-right">
									<form action="{{route('budgets.destroy', ['budget' => $budget->id])}}" method="POST">
						            {{ csrf_field() }}
						            {{ method_field('DELETE') }}
						            <button type="submit" class="btn btn-default">Eliminar</button>
						        	</form>
						        	</div>
						        </td>
					        @endif
						</tr>
					</table>
					<hr>
				</div>
			@endforeach

			@if($authRole != 2)
				<div class="pull-right">
					{{$budgets->links()}}
					<br>
					<br>
				</div>
			@endif
			
			@if($authRole != 3)
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
			@endif
		</div>
	</div>
@endsection
