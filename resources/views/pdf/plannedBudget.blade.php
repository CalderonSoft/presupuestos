<html>
  	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <title>Presupuesto Planeado</title>
	    <style type="text/css">
	    	body {
	    		font-family: sans-serif;
	    	}

	    	table {
	    		font-size: 0.8em;
	    	}

		    th {
				background-color: #447BD4;
				color: white;
				text-align: center;
				padding: 5px;
	    	}

	    	td {
	    		padding-left: 10px;
	    	}

	    	.header{
				background-color: #447BD4;
				color: white;
				font-size: 1.5em;
				font-weight: bolder;
				text-align: right;
				padding: 15px;
	    	}
	    	.period{
	    		font-weight: normal;
	    		text-align: left;
	    		display: inline;
	    		float: left;
	    	}
	    	.budget{
	    		font-size: 1.3em;
	    		margin-top: 15px;
	    	}
	    	.totales-row{
	    		font-weight: bold;
	    	}
	    	.total-row{
	    		font-size: 1.5em;
	    	}
	    	.totales-title{
	    		text-align: right;
	    		padding-right: 10px;
	    	}
	    	.success{
	    		background-color: #dff0d8;
	    	}
	    	.info{
	    		background-color: #d9edf7;
	    	}
	    	.danger{
	    		background-color: #f2dede;
	    	}
	    	.category{
	    		text-align: left;
	    		padding: 5px;
	    		font-size: 1.2em;
	    		font-weight: bold;
	    	}
	    </style>
  	</head>
  	<body>
	  	<div class="header">
	  		<div class="period">
	  			Año {{$year}}
	  		</div>
	  		Presupuesto Planeado
	  	</div>
		<div>
			<div class="budget">
				<b>{{$budget->name}}</b>				
			</div>
				{{$budget->description}}
		</div>
		<table width="100%">
			<thead>
				<tr>
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
						TOTAL
					</th>
				</tr>
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
							<td colspan="13" class="category">
								{{$category->name}}
							</td>
							<td>
							</td>
						</tr>
						@foreach($items as $item)
							@if($item->category_id == $category->id)
							<?php $sumItem = 0; ?>
								<tr>
								<!-- Descripción del item -->
									<td style="text-align: left;">
										{{$item->description}}
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
							<td class="totales-title">
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
						<td class="totales-title">
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
	</body>
</html>