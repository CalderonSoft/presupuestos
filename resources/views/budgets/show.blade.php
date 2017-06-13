@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
		<small class="pull-right">
        	<a href="{{route('categories_create', ['budget' => $budget->id])}}" class="btn btn-primary">Agregar Categoría</a>
        	</form>

      	</small>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		<table class="table">
			<thead>
				<th>

				</th>
				<th>
					Ene
				</th>
				<th>
					Feb
				</th>
				<th>
					Mar
				</th>
				<th>
					Abr
				</th>
				<th>
					May
				</th>
				<th>
					Jun
				</th>
				<th>
					Jul
				</th>
				<th>
					Ago
				</th>
				<th>
					Sep
				</th>
				<th>
					Oct
				</th>
				<th>
					Nov
				</th>
				<th>
					Dic
				</th>
				<th>
					<b>TOTAL</b>
				</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
						<tr>
							<td width="20%">
								<b><a href="{{route('categories.edit', ['category' => $category->id])}}">{{$category->name}}</a></b>
							</td>
							<td colspan="12">

							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td colspan="14">
								Primer Item
							</td>
						</tr>
						<tr>
							<td colspan="14">
								Segundo Item
							</td>
						</tr>
						<tr>
							<td colspan="14">
								Tercer Item
							</td>
						</tr>
						<tr class="
						@if($category->class == "Ingreso")
							success
						@else
							danger
						@endif
						">
							<td>
								<b>TOTAL</b>
							</td>
							<td colspan="12">

							</td>
							<td>
								$
							</td>
						</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
