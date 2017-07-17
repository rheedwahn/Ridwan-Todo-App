@extends('layouts.layout')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Create a New Todo</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group {{ $errors->has('todo') ? ' has-error' : '' }}">
					<label for="todo">Enter your Todo</label>
					<input type="text" name="todo" placeholder="Enter your Todo here" class="form-control"></input>

					@if($errors->has('todo'))
						<span class="help-block">{{ $errors->first('todo') }}</span>
					@endif
				</div>
				<div class="form-group">
					<button class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>

@stop