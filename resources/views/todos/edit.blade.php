@extends('layouts.layout')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Edit Todo: {{ $todo->todo }}</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group {{ $errors->has('todo') ? ' has-error' : '' }}">
					<label for="todo">Edit your Todo</label>
					<input type="text" name="todo" value="{{ $todo->todo }}" class="form-control"></input>

					@if($errors->has('todo'))
						<span class="help-block">{{ $errors->first('todo') }}</span>
					@endif
				</div>
				<div class="form-group">
					<button class="btn btn-success">Update Todo</button>
				</div>
			</form>
		</div>
	</div>

@stop