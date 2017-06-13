@extends('layouts.app')

@section('class')
	Presupuestos
@endsection

@section('action')
	| Editar
@endsection

@section('content')
	@include('budgets._form', ['budget' => $budget])
@endsection