<!-- MODAL -->
<div class="modal fade" id="createUser" role="dialog">
	<div class="modal-dialog">
		<!-- Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
				<div class="login-box-body">
					<form action="{{ route('users.store') }}" method="post">
			        {{ csrf_field() }} 
			          
			          <div class="form-group has-feedback form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			            <label>Nombre</label>
			            <!-- <input type="text" class="form-control" name="name" > -->
			            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

			            @if ($errors->has('name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif
			            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			          </div>

			           <div class="form-group has-feedback form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			             <label>E-mail</label>
			            <!-- <input type="email" class="form-control" name="email" > -->
			            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

			            @if ($errors->has('email'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('email') }}</strong>
			                </span>
			            @endif
			            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			          </div>

			          <div class="form-group has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			            <label>Contraseña</label>
			            <input id="password" type="password" class="form-control" name="password" required>

			            @if ($errors->has('password'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('password') }}</strong>
			                </span>
			            @endif
			            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			          </div>

			          <div class="form-group has-feedback">
			            <label>Confirmar Contraseña</label>
			            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			          </div>

			          <div class="form-group has-feedback">
			                <label>Género</label>
			                <br>
			                <input type="radio" name="genre" value="hombre" checked="checked"> Hombre &nbsp;&nbsp;
			                <input type="radio" name="genre" value="mujer"> Mujer
			          </div>  

			          <div class="form-group has-feedback">
			                <label>Rol</label>
			                <br>
			                <input type="radio" name="role" value="1"> Administrador &nbsp;&nbsp;
			                <input type="radio" name="role" value="2" checked="checked"> Gestor de presupuestos &nbsp;&nbsp;
			                <input type="radio" name="role" value="3"> Usuario de consulta
			          </div>

			          <div class="pull-right">
			            
			            <div class="col-xs-4">
			              <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
			            </div><!-- /.col -->
			          </div>
			          <br>
			        </form>
				</div>
			</div>
		</div>
	</div>
</div>
