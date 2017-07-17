@extends('layouts.layout')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Posts</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Todos
					</th>

					<th>
						Restore
					</th>

					<th>
						Delete
					</th>
				</thead>
				<tbody>

					@foreach($todo as $todos)

						@if($todos->user_id === Auth::user()->id)
							<tr>
								<td>
									{{ $todos->todo }}
								</td>
								<td>
									<a href="{{ route('todo.restore', ['id'=>$todos->id]) }}" class="btn btn-primary">Restore</a>
								</td>
								<td>
									<a href="{{ route('trashed.delete', ['id'=>$todos->id]) }}" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						@endif

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop