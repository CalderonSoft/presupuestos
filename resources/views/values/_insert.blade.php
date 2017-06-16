@if(!$values->isempty())
	<form action="" method="POST">
	{{method_field('PUT')}}
@else
	<form action="" method="POST">
@endif

{{ csrf_field() }}
    <table class="table"  style="width: 250px; text-align: right;">
			<thead>
				<th colspan="2" style="text-align: center;">
					<h4 class="text-info"><b>Ingresar valores</b></h4>
				</th>
			</thead>
			<tbody>
				<tr>
	        <td>
	          <label for="ene">Enero</label>
	        </td>
	        <td>
	    			<input type="text" min="0" name="ene" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="feb">Febrero</label>
	        </td>
	        <td>
	    			<input type="text" name="feb" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="mar">Marzo</label>
	        </td>
	        <td>
	    			<input type="text" name="mar" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="abr">Abril</label>
	        </td>
	        <td>
	    			<input type="text" name="abr" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="may">Mayo</label>
	        </td>
	        <td>
	    			<input type="text" name="may" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="jun">Junio</label>
	        </td>
	        <td>
	    			<input type="text" name="jun" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="jul">Julio</label>
	        </td>
	        <td>
	    			<input type="text" name="jul" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="ago">Agosto</label>
	        </td>
	        <td>
	    			<input type="text" name="ago" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="sep">Septiembre</label>
	        </td>
	        <td>
	    			<input type="text" name="sep" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="oct">Octubre</label>
	        </td>
	        <td>
	    			<input type="text" name="oct" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="nov">Noviembre</label>
	        </td>
	        <td>
	    			<input type="text" name="nov" class="form-control" value=""/>
	        </td>
	      </tr>
	      <tr>
	        <td>
	          <label for="dic">Diciembre</label>
	        </td>
	        <td>
	    			<input type="text" name="dic" class="form-control" value=""/>
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
