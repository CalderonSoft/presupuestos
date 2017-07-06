@extends('layouts.app')

@section('content')
	<h1>
		<b>{{$budget->name}}</b>
	</h1>
	<p>{{$budget->description}}</p>
	<div class="login-box-body">
		<div style="text-align: center; width: 100%;">
			<table class="table" style="width: 500px; margin: 0 auto;">
				<form action="{{route('budgets_updateOwner')}}" method="POST">
				{{ csrf_field() }}
					<input type="hidden" name="budget_id" value="{{$budget->id}}">
					<thead>
						<tr>
							<th colspan="2">
								Reasignar Propietario
							</th>
							<th width="100px;">
								<input type="submit" name="" value="Reasignar" class="btn btn-success">
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td width="30px">
								<input type="radio" name="owner" value="{{$user->id}}" required="required">
							</td>
							<td colspan="2">
								{{$user->name}}
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="3" style="text-align: right;">
								{{$users->links()}}
							</td>
						</tr>
					</tbody>
				</form>
			</table>
		</div>
	</div>
@endsection
