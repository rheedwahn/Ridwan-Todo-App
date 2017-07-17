@extends('layouts.layout')

@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Register</h3>
			</div>
			<div class="panel-body">
				<form class="form-vertical" role="form" method="post" enctype="multipart/form-data" action="{{ route('user.register') }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name" class="control-label">Your Name</label>
					<input type="text" name="name" class="form-control" id="name" value="{{ Request::old('name') ?: '' }}">

					@if($errors->has('name'))
						<span class="help-block">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">Your email Address</label>
					<input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">

					@if($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					<label for="username" class="control-label">Choose a Username</label>
					<input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">

					@if($errors->has('username'))
						<span class="help-block">{{ $errors->first('username') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Choose a Password</label>
					<input type="password" name="password" class="form-control" id="password" value="">

					@if($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
					<label for="profile" class="control-label">Choose a Profile Image</label>
					<input type="file" name="profile" class="form-control" value="{{ Request::old('profile') }}">

					@if($errors->has('profile'))
						<span class="help-block">{{ $errors->first('profile') }}</span>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Register</button>
					<a href="{{ route('login') }}">Already have an account</a>
				</div>
				
			</form>
			</div>
		</div>
			

@stop