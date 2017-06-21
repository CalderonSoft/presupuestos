@if(count($errors) > 0)

	<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
			@foreach($errors->all() as $error)
				<span class="glyphicon glyphicon-exclamation-sign"></span>
				{{$error}}
				<br>
			@endforeach
	</div>

@endif
