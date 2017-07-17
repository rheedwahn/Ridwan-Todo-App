@extends('layouts.layout')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Todos</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Todos
					</th>

					<th>
						Edit
					</th>

					<th>
						Mark as Completed
					</th>

					<th>
						Trash
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
									<a href="{{ route('todo.edit', ['id'=>$todos->id]) }}" class="btn btn-primary">Edit</a>
								</td>
								<td>
									@if(!$todos->completed)
										<a href="{{ route('todo.completed', ['id'=>$todos->id]) }}" class="btn btn-success">Mark Completed</a>
									@else
										<p>Completed <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></button></p>
									@endif
								</td>
								<td>
									<a href="{{ route('todo.delete', ['id'=>$todos->id]) }}" class="btn btn-danger">Trash</a>
								</td>
							</tr>
						@endif

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop