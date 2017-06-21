@if(session()->has('message'))

<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
	<span class="glyphicon glyphicon-ok"></span>
	{{session()->get('message')}}
</div>

@endif
