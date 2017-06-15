<!-- MODAL -->
<div class="modal fade" id="createBudget" role="dialog">
	<div class="modal-dialog">
		<!-- Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nuevo Presupuesto</h4>
			</div>
			<div class="modal-body">
				<div class="login-box-body">
					<form action="{{ route('budgets.store') }}" method="POST">
						{{ csrf_field() }}
							<div class="login-box-body">
								<!-- Title field -->
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus />
								</div>
								<!-- Description Input -->
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="5" name="description" class="form-control" required>{{old('description')}}</textarea>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
