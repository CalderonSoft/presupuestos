<!-- MODAL -->
<div class="modal fade" id="createItem" role="dialog">
	<div class="modal-dialog">
		<!-- Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Item <small>Crear</small></h4>
			</div>
			<div class="modal-body">
				<div class="login-box-body">
					<form action="{{route('items.store')}}" method="POST">
					{{ csrf_field() }}
						<input type="hidden" name="category_id" value="{{$category->id}}">
						<div class="form-group">
							<label  for="description">Descripción:</label>
							<input type="text" name="description" class="form-control" value="">
						</div>
						<div class="pull-right">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Guardar">
							</div>
						</div>
						<br>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>