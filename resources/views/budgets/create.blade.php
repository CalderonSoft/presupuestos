@extends('layouts.app')

@section('class')
	Presupuesto
@endsection

@section('action')
	Crear
@endsection

@section('content')
	@include('budgets._form', ['budget' => $budget])
@endsection