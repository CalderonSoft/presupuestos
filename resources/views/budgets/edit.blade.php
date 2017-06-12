@extends('layouts.app')

@section('class')
	Presupuesto
@endsection

@section('action')
	Editar
@endsection

@section('content')
	@include('budgets._form', ['budget' => $budget])
@endsection