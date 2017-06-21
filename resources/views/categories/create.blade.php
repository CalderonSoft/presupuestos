<!-- MODAL -->
<div class="modal fade" id="createCategory" role="dialog">
	<div class="modal-dialog">
		<!-- Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nueva Categoría en el Presupuesto</h4>
			</div>
			<div class="modal-body">
				<div class="login-box-body">
					<form action="{{ route('categories.store') }}" method="POST">
						{{ csrf_field() }}
						<div class="login-box-body">
							<input type="hidden" name="budgetYear" value="{{$year}}">
							<input type="hidden" name="budget_id" value="{{$budget->id}}">
							<!-- Name field -->
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" class="form-control" value="{{$category->name or old('name')}}" required autofocus />
							</div>
							<!-- Class -->
							<div class="form-group has-feedback text-right">
				              <!-- <label>Género:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				                  <input type="radio" name="class" class="radio-inline" value="Ingreso" checked="checked"> Ingreso &nbsp;&nbsp;
				                  <input type="radio" name="class" class="radio-inline" value="Egreso"> Egreso
				          </div>

							<div class="form-group pull-right">
								<button type="submit" class="btn btn-primary btn-lg">Guardar</button>
							</div>
							<br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>