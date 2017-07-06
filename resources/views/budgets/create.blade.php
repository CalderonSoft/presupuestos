@extends('layouts.app')

@section('class')
	Presupuesto
@endsection

@section('action')
	| Crear
@endsection

@section('content')
	@if(Auth::user()->role == 3)
		@include('layouts._restrictedAccess')
	@else
		@include('budgets._form', ['budget' => $budget])
	@endif
@endsection