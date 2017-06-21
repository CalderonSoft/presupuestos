@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		@if($categories->isempty())
			<h2 style="text-align: center; margin-top: 100px; min-height: 150px;">
				<b>¡Este presupuesto aún no ha sido planeado!</b>
				<br>
				<small>
					El presupuesto no tiene categorías configuradas.
				</small>
			</h2>
		@endif
		<h2><small>Elija el tipo de movimiento</small></h2>
		<table class="table">
		@foreach($categories as $category)
		<tr
		@if($category->class == "Ingreso")
			class="success"
		@else
			class="danger"
		@endif
		>
			<td style="vertical-align: middle;">
				<h4><b>{{$category->name}}</b></h4>
			</td>
			<td>
				<ul class="list-group">
					@foreach($items as $item)
						@if($category->id == $item->category_id)
						<a href="">
						<li class="list-group-item">
							{{$item->description}}
						</li>
						</a>
						@endif
					@endforeach
				</ul>
			</td>
		</tr>
		@endforeach
	</table>
	</div>
	

@endsection