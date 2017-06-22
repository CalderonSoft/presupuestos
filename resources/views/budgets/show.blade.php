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
			<?php
				//Variables para Totales del ppto
				$totEne = 0;
				$totFeb = 0;
				$totMar = 0;
				$totAbr = 0;
				$totMay = 0;
				$totJun = 0;
				$totJul = 0;
				$totAgo = 0;
				$totSep = 0;
				$totOct = 0;
				$totNov = 0;
				$totDic = 0;
				$totTot = 0;
			?>
				@foreach($categories as $category)
				<?php
					//Variables para totales de categorías
					$sumEne = 0;
					$sumFeb = 0;
					$sumMar = 0;
					$sumAbr = 0;
					$sumMay = 0;
					$sumJun = 0;
					$sumJul = 0;
					$sumAgo = 0;
					$sumSep = 0;
					$sumOct = 0;
					$sumNov = 0;
					$sumDic = 0;
					$sumTot = 0;
				?>
						<tr>
							<!-- Nombre de la Categoría -->
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
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumEne += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Febrero -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-02-01')
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumFeb += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Marzo -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-03-01')
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumMar += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Abril -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-04-01')
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumAbr += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Mayo -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-05-01')
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumMay += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Junio -->
									<td>
									@foreach($values as $value)
										@if($value->item_id == $item->id && $value->date == $year.'-06-01')
											${{number_format($value->amount, 0, ",", ".")}}
											<?php
												$sumItem += $value->amount;
												$sumJun += $value->amount;
											?>
											@break
										@endif
									@endforeach
									</td>
									<!-- Valor de Julio -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-07-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumJul += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Agosto -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-08-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumAgo += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Septiembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-09-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumSep += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Octubre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-10-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumOct += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Noviembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-11-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumNov += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- Valor de Diciembre -->
									<td>
									@foreach($values as $value)
									@if($value->item_id == $item->id && $value->date == $year.'-12-01')
										${{number_format($value->amount, 0, ",", ".")}}
										<?php
											$sumItem += $value->amount;
											$sumDic += $value->amount;
										?>
										@break
									@endif
									@endforeach
									</td>
									<!-- TOTAL del item en el año -->
									<td>
									${{number_format($sumItem, 0, ",", ".")}}
									<?php
										$sumTot += $sumItem;
									?>
									</td>
								</tr>
							</form>
							@endif
						@endforeach
						<tr
						@if($category->class == "Ingreso")
							class="success"
							<?php
								$totEne += $sumEne;
								$totFeb += $sumFeb;
								$totMar += $sumMar;
								$totAbr += $sumAbr;
								$totMay += $sumMay;
								$totJun += $sumJun;
								$totJul += $sumJul;
								$totAgo += $sumAgo;
								$totSep += $sumSep;
								$totOct += $sumOct;
								$totNov += $sumNov;
								$totDic += $sumDic;
								$totTot += $sumTot;
							?>
						@else
							class="danger"
							<?php
								$totEne -= $sumEne;
								$totFeb -= $sumFeb;
								$totMar -= $sumMar;
								$totAbr -= $sumAbr;
								$totMay -= $sumMay;
								$totJun -= $sumJun;
								$totJul -= $sumJul;
								$totAgo -= $sumAgo;
								$totSep -= $sumSep;
								$totOct -= $sumOct;
								$totNov -= $sumNov;
								$totDic -= $sumDic;
								$totTot -= $sumTot;
							?>
						@endif
						>
							<td>
								<b>Subtotal</b>
							</td>
							<!-- Subtotal Enero -->
							<td>
								${{number_format($sumEne, 0, ",", ".")}}
							</td>
							<!-- Subtotal Febrero -->
							<td>
								${{number_format($sumFeb, 0, ",", ".")}}
							</td>
							<!-- Subtotal Marzo -->
							<td>
								${{number_format($sumMar, 0, ",", ".")}}
							</td>
							<!-- Subtotal Abril -->
							<td>
								${{number_format($sumAbr, 0, ",", ".")}}
							</td>
							<!-- Subtotal Mayo -->
							<td>
								${{number_format($sumMay, 0, ",", ".")}}
							</td>
							<!-- Subtotal Junio -->
							<td>
								${{number_format($sumJun, 0, ",", ".")}}
							</td>
							<!-- Subtotal Julio -->
							<td>
								${{number_format($sumJul, 0, ",", ".")}}
							</td>
							<!-- Subtotal Agosto -->
							<td>
								${{number_format($sumAgo, 0, ",", ".")}}
							</td>
							<!-- Subtotal Septiembre -->
							<td>
								${{number_format($sumSep, 0, ",", ".")}}
							</td>
							<!-- Subtotal Octubre -->
							<td>
								${{number_format($sumOct, 0, ",", ".")}}
							</td>
							<!-- Subtotal Noviembre -->
							<td>
								${{number_format($sumNov, 0, ",", ".")}}
							</td>
							<!-- Subtotal Diciembre -->
							<td>
								${{number_format($sumDic, 0, ",", ".")}}
							</td>
							<!-- TOTAL de la categoría en el año -->
							<td>
								${{number_format($sumTot, 0, ",", ".")}}
							</td>
						</tr>
				@endforeach
				<tr>
					<td colspan="14">

					</td>
				</tr>
					<tr class="info">
						<td>
							<b>TOTAL</b>
						</td>
						<!-- Subtotal Enero -->
						<td>
								${{number_format($totEne, 0, ",", ".")}}
						</td>
						<!-- Subtotal Febrero -->
						<td>
								${{number_format($totFeb, 0, ",", ".")}}
						</td>
						<!-- Subtotal Marzo -->
						<td>
								${{number_format($totMar, 0, ",", ".")}}
						</td>
						<!-- Subtotal Abril -->
						<td>
								${{number_format($totAbr, 0, ",", ".")}}
						</td>
						<!-- Subtotal Mayo -->
						<td>
								${{number_format($totMay, 0, ",", ".")}}
						</td>
						<!-- Subtotal Junio -->
						<td>
								${{number_format($totJun, 0, ",", ".")}}
						</td>
						<!-- Subtotal Julio -->
						<td>
								${{number_format($totJul, 0, ",", ".")}}
						</td>
						<!-- Subtotal Agosto -->
						<td>
								${{number_format($totAgo, 0, ",", ".")}}
						</td>
						<!-- Subtotal Septiembre -->
						<td>
								${{number_format($totSep, 0, ",", ".")}}
						</td>
						<!-- Subtotal Octubre -->
						<td>
								${{number_format($totOct, 0, ",", ".")}}
						</td>
						<!-- Subtotal Noviembre -->
						<td>
								${{number_format($totNov, 0, ",", ".")}}
						</td>
						<!-- Subtotal Diciembre -->
						<td>
								${{number_format($totDic, 0, ",", ".")}}
						</td>
						<!-- TOTAL de la categoría en el año -->
						<td>
							<b>
								${{number_format($totTot, 0, ",", ".")}}
							</b>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
@endsection
