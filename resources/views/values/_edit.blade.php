<form action="{{ route('values_update') }}" method="POST" class="form-inline">
	{{ csrf_field() }}
	<input type="hidden" name="budgetYear" value="{{$year}}">
	<input type="hidden" name="budget_id" value="{{$budget->id}}">
	<input type="hidden" name="item_id" value="{{$item->id}}">
    <table class="table"  style="width: 250px;">
			<thead>
				<th colspan="2" style="text-align: center;">
					<h4 class="text-info"><b>Ingresar valores</b></h4>
				</th>
			</thead>
			<tbody>
				<tr>
	        <td style="vertical-align: middle;">
	          <label for="ene">Enero</label>          
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="ene" class="glyphicon glyphicon-usd"></label>
	        	</div>	        		
	        		<input type="text" name="ene" class="form-control"	        		
	        		@foreach($values as $value)
	        			@if($value->date == $year.'-01-01')
	        			value="{{$value->amount}}" style="text-align: right;"/>
	        			<input type="hidden" name="ene_id" value="{{$value->id}}">
	        			@break
	        			@endif
					@endforeach 		        			        	
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="feb">Febrero</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="feb" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="feb" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-02-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
	        		<input type="hidden" name="feb_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="mar">Marzo</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="mar" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="mar" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-03-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="mar_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td style="vertical-align: middle;">
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="abr">Abril</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="abr" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="abr" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-04-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="abr_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="may">Mayo</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="may" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="may" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-05-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="may_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td">
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="jun">Junio</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="jun" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="jun" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-06-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="jun_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="jul">Julio</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="jul" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="jul" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-07-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="jul_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="ago">Agosto</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="ago" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="ago" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-08-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="ago_id" value="{{$value->id}}">        			
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="sep">Septiembre</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="sep" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="sep" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-09-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="sep_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr style="vertical-align: middle;">
	      <tr>
	        <td>
	          <label for="oct">Octubre</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="oct" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="oct" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-10-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="oct_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="nov">Noviembre</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="nov" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="nov" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-11-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="nov_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
	      <tr>
	        <td style="vertical-align: middle;">
	          <label for="dic">Diciembre</label>
	        </td>
	        <td>
	        	<div class="pull-left" style="position: absolute; padding-top: 8px; padding-left: 2px;" valign="middle">
	        		<label  for="dic" class="glyphicon glyphicon-usd"></label>
	        	</div>
	    		<input type="text" name="dic" class="form-control"
	    		@foreach($values as $value)
        			@if($value->date == $year.'-12-01')
        			value="{{$value->amount}}" style="text-align: right;"/>
        			<input type="hidden" name="dic_id" value="{{$value->id}}">
        			@break
        			@endif
				@endforeach	    		
	        </td>
	      </tr>
				<tr>
					<td colspan="2">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Registrar valores</button>
						</div>
					</td>
				</tr>
			</tbody>
    </table>
</form>
