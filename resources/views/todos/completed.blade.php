@extends('layouts.layout')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Completed Todos</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Completed Todos
					</th>

					<th>
						Mark as Uncompleted
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
									<a href="{{ route('make.uncompleted', ['id' => $todos->id]) }}" class="btn btn-primary">Mark Uncompleted</a>
								</td>
								<td>
									<a href="{{ route('todo.delete', ['id' => $todos->id]) }}" class="btn btn-danger">Trash</a>
								</td>
							</tr>
						@endif

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop