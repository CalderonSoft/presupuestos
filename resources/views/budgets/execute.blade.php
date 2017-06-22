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
			<div style="text-align: center; width: 100%;">
				<table class="table" style="width: 50%; margin: 0 auto;">
					<thead>
						<tr>
							<td colspan="2">
								Seleccione el elemento al que pertenece el movimiento a registrar.
							</td>
						</tr>
					</thead>
				@foreach($categories as $category)
				<tbody>
					<tr
					@if($category->class == "Ingreso")
						class="success"
					@else
						class="danger"
					@endif
					>
						<td style="vertical-align: middle; width:50%;">
							<h4><b>{{$category->name}}</b></h4>
						</td>
						<td style="text-align: left">
							<ul class="list-group">
								@foreach($items as $item)
									@if($category->id == $item->category_id)
									<a href="{{route('values_create', ['item' => $item->id])}}">
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
				</tbody>
			</table>
		</div>
	</div>


@endsection
