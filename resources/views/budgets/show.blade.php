@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
		<small class="pull-right">
        	<!-- <a href="{{route('categories_create', ['budget' => $budget->id])}}" class="btn btn-lg btn-primary">Agregar Categoría</a>        	 -->
        	<a href="" data-toggle="modal" data-target="#createCategory" class="btn btn-lg btn-primary">Agregar Categoría</a>
        	@include('categories.create')
      	</small>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		<table class="table">
			<thead>
				<th width="20%" style="text-align: center;">
					<form class="form-inline" action="{{route('budgets_show', ['budget' => $budget->id])}}" method="GET" style="font-size: 1.2em;">
					{{csrf_field()}}
						<input type="hidden" name="budget_id" value="{{$budget->id}}">
						<label for="budgetYear"><b>AÑO </b></label>
						<select class="form-control" name="budgetYear">
							@for($i = 0 ; $i < 5 ; $i++)
							<option value="{{date("Y") + $i}}"
							@if($year != null)
								@if($year == (date("Y") + $i))
									selected="true"
								@endif
							@endif
							>{{date("Y") + $i}}</option>
							@endfor
						</select>
						<button type="submit" name="button" class="btn btn-info glyphicon glyphicon-refresh"></button>
					</form>
				</th>
				<th style="text-align: center;">
					Ene
				</th>
				<th style="text-align: center;">
					Feb
				</th>
				<th style="text-align: center;">
					Mar
				</th>
				<th style="text-align: center;">
					Abr
				</th>
				<th style="text-align: center;">
					May
				</th>
				<th style="text-align: center;">
					Jun
				</th>
				<th style="text-align: center;">
					Jul
				</th>
				<th style="text-align: center;">
					Ago
				</th>
				<th style="text-align: center;">
					Sep
				</th>
				<th style="text-align: center;">
					Oct
				</th>
				<th style="text-align: center;">
					Nov
				</th>
				<th style="text-align: center;">
					Dic
				</th>
				<th style="text-align: center;">
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
							<form>
								<tr>
									<td>
									<a href="{{route('items_edit', ['item' => $item->id])}}">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
									@if(strlen($item->description) > 25)
									{{substr($item->description, 0, 25)}}...
									@else
									{{$item->description}}
									@endif
									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>
							</form>
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
				<tr>
					<td colspan="14">

					</td>
				</tr>
					<tr>
						<td colspan="13">

						</td>
						<td class="info">
							<b>$</b>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
@endsection
