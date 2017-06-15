@extends('layouts.app')

@section('content')
<div class="login-box-body">
			<form id="editCategory" action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
			{{method_field('PUT')}}

		{{ csrf_field() }}
			
				<input type="hidden" name="category_id" value="{{$category->id}}">
				<!-- Name field -->
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{$category->name or old('name')}}"/>
				</div>
				<!-- Class -->
				<div class="form-group has-feedback">
	              <!-- <label>Género:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
	                  <input type="radio" name="class" class="radio-inline" value="Ingreso" checked="checked"> Ingreso &nbsp;&nbsp;
	                  <input type="radio" name="class" class="radio-inline" value="Egreso" 
	                  @if($category->class == "Egreso")
	                  checked="checked"
	                  @endif> Egreso
	            </div>

	            <small class="pull-right">
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Guardar" />
				</div>
				</small>
		</form>
		<small class="pull-right" style="margin-right: 15px">
		<form id="deleteCategory" action="{{route('categories.destroy', ['category' => $category->id])}}" method="POST">
	    {{ csrf_field() }}
	    {{ method_field('DELETE') }}
	    <input type="submit" class="btn btn-default" value="Eliminar" />
		</form>
		</small>
		<br>
		<br>	
	<hr>
	<div>
		<h3>
			<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createItem" style="padding: 0; width: 32px;">
				<b data-toggle="tooltip" title="Agregar nuevo item" style="font-size: 20px;">+</b>						
			</a>
			<small><b>Items de la categoría</b></small>			
		</h3>
		@include('items.create')
		<ul>
			@foreach($items as $item)
			<li>
				{{$item->description}}
			</li>
			@endforeach
		</ul>
	</div>
</div>	        	
@endsection