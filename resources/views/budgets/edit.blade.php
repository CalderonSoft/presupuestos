@extends('layouts.app')

@section('class')
	Presupuesto
@endsection

@section('action')
	| Editar
@endsection

@section('content')
	@if(Auth::user()->id == $budget->user_id)
		@include('budgets._form', ['budget' => $budget])
	@else
		@include('layouts._restrictedAccess');
	@endif
@endsection