@extends ('layouts.app')

@section('class')
	Usuarios
@endsection

@section('action')
	| Administración
@endsection

@section('content')
	<div class="login-box-body">
		<!-- <div class="row"> -->
		<div class="row">			
			<div class="col-md-12">
				<table width="100%" class="table">
					<thead>
						<tr>
							<th>
								Nombre
							</th>
							<th>
								E-mail
							</th>
							<th>
								Rol
							</th>
							<th>
								
							</th>
						</tr>
					</thead>
				@foreach($users as $user)
					<tr>
						<td style="">
							{{$user->name}}
						</td>
						<td>
							{{$user->email}}
						</td>
						<td>
							@php $role = $user->role @endphp
							@if($role == 1)
								Administrador
							@elseif($role == 2)
								Gestor de presupuestos
							@else
								Usuario de consulta
							@endif
						</td>
						<td width="160px">
							<div class="pull-left">
							<a href="{{route('users.edit', ['user' => $user->id])}}" class="btn btn-default" style="">Editar</a>
							</div>		
							<div class="pull-right">
							<form action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">
				            {{ csrf_field() }}
				            {{ method_field('DELETE') }}
				            <button type="submit" class="btn btn-default">Eliminar</button>
				        	</form>
				        	</div>
				        </td>
					</tr>
				@endforeach
				</table>
			</div>			
			
			<div class="col-md-3">
				<div
					style="
					position: fixed;
					right: 40px;
					bottom: 30px;
					z-index: 9999;
					">
					<a href="" data-toggle="modal" data-target="#createUser">
						<img src="{{asset('dist/icons/plus_24.png')}}" data-toggle="tooltip" title="Crea un nuevo usuario">
					</a>
				</div>
				@include('users.create')
			</div>
		</div>
	</div>
@endsection
