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
					<form class="form-inline" action="{{route('budgets_year', ['budget' => $budget->id])}}" method="GET" style="font-size: 1.2em;">
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
			<tbody style="text-align: right;">
				@foreach($categories as $category)
						<tr>
							<td colspan="13" style="text-align: left;">
								<h4 class="inline"><b><a href="{{route('categories_edit', ['category' => $category->id, 'year' => $year])}}">{{$category->name}}</a></b></h4>
							</td>
							<td>
							</td>
						</tr>
						@foreach($items as $item)
							@if($item->category_id == $category->id)
							<?php $sumItem = 0; ?>
							<form>
								<tr>
								<!-- Descripción del item -->
									<td style="text-align: left;">
									<a href="{{route('items_edit', ['item' => $item->id, 'budget' => $budget->id, 'year' => $year])}}">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>									
										@if(strlen($item->description) > 25)
										<span data-toggle="tooltip" title="{{$item->description}}">
											{{substr($item->description, 0, 25)}}...
										</span>
										@else
										{{$item->description}}
										@endif								
									</td>
									<!-- Valor de Enero -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-01-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Febrero -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-02-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Marzo -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-03-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach									
									</td>
									<!-- Valor de Abril -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-04-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Mayo -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-05-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Junio -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-06-01')
											${{$value->amount}}
											<?php $sumItem += $value->amount ?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Julio -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-07-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Agosto -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-08-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Septiembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-09-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Octubre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-10-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Noviembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-11-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Diciembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-12-01')
										${{$value->amount}}
										<?php $sumItem += $value->amount ?>
										@break
									@endif
									@endforeach
									</td>
									<!-- TOTAL del item en el año -->
									<td>
									${{$sumItem}}
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
							<!-- TOTAL de la categoría en el año -->
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
