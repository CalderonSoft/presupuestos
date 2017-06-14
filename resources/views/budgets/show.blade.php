@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
		<small class="pull-right">
        	<a href="{{route('categories_create', ['budget' => $budget->id])}}" class="btn btn-lg btn-primary">Agregar Categoría</a>        	
        	</form>

      	</small>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		<table class="table">
			<thead>
				<th width="20%">

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
							<td colspan="13">							
								<h4 class="inline"><b><a href="{{route('categories.edit', ['category' => $category->id])}}">{{$category->name}}</a></b></h4>
							</td>
							<td>
							</td>
						</tr>
						@foreach($items as $item)
							@if($item->category_id == $category->id)
								<tr>
									<td>
									{{$item->description}}
									</td>
									<td colspan="13">
										
									</td>
								</tr>
							@endif
						@endforeach
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
