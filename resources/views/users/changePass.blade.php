<!-- MODAL -->
<div class="modal fade" id="changePass" role="dialog">
	<div class="modal-dialog">
		<!-- Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cambiar contraseña</h4>
			</div>
			<div class="modal-body">
				<div class="login-box-body">
					<form action="{{ route('users.changePass') }}" method="post">
				        {{ csrf_field() }} 	
				        <input type="hidden" name="user_id" value="{{$user->id}}">
				        <!-- Password -->
				          <div class="form-group has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				            <label>Contraseña</label>
				            <input id="password" type="text" class="form-control" name="password" required>
				            @if ($errors->has('password'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('password') }}</strong>
				                </span>
				            @endif
				            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				          </div>
				          <!-- Botón -->
				          <div class="pull-right">			            
				            <div class="col-xs-4">
				              <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
				            </div>
				          </div>
				          <br>
			        </form>
				</div>
			</div>
		</div>
	</div>
</div>
