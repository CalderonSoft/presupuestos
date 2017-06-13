@extends('layouts.app')

@section('class')
	Presupuestos
@endsection

@section('action')
	| Crear
@endsection

@section('content')
	@include('budgets._form', ['budget' => $budget])
@endsection