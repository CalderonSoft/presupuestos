@extends('layouts.app')

@section('class')
	Usuario
@endsection

@section('action')
	| Editar
@endsection

@section('content')
	@if(Auth::user() == $user || Auth::user()->role == 1)
	<div class="login-box-body">
		<form id="editUser" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
		{{method_field('PUT')}}
		{{ csrf_field() }}
			<input type="hidden" name="user_id" value="{{$user->id}}">
			<!-- Name field -->
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" name="name" class="form-control" value="{{$user->name}}"/>
			</div>
			<!-- Email -->
			<div class="form-group">
	          	<label for="email">Email</label>
				<input type="text" name="email" class="form-control" value="{{$user->email}}"/>	                  
	        </div>
	        <!-- Género -->
	        <div class="form-group has-feedback">
	            <label>Género</label>
	            <br>
	            <input type="radio" name="genre" value="hombre" checked="checked"> Hombre &nbsp;&nbsp;
	            <input type="radio" name="genre" value="mujer"
	            @if($user->genre == "mujer")
		        	checked="checked"
		        @endif
	            > Mujer
	      	</div> 
	        <!-- Role -->
	        @php
	        	$role = $user->role;
	        @endphp
			<div class="form-group">
	          	<label>Rol</label>
	          	<br>
		        <input type="radio" name="role" class="radio-inline" value="1"
		        @if($role == 1)
		        	checked="checked"
		        @endif
		        > Administrador &nbsp;&nbsp;
		        <input type="radio" name="role" class="radio-inline" value="2"
		        @if($role == 2)
		          	checked="checked"
		        @endif
		        > Gestor de presupuestos &nbsp;&nbsp;
		        <input type="radio" name="role" class="radio-inline" value="3"
		        @if($role == 3)
		         	checked="checked"
		        @endif
		        > Usuario de consulta
	        </div>
	        <small class="pull-right">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Guardar" />
			</div>
			</small>
		</form>
		<small class="pull-right" style="margin-right: 15px">
			<a href="" class="btn btn-default" data-toggle="modal" data-target="#changePass">Cambiar contraseña</a>
			@include('users.changePass')
		</small>
		@if(Auth::user()->role == 1)
		<small class="pull-right" style="margin-right: 15px">
			<a href="{{route('users.index')}}" class="btn btn-default">Volver</a>
		</small>
		@endif
		<br>
		<br>
	</div>
	@else
		@include('layouts._restrictedAccess')
	@endif
@endsection