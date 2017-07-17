@extends('layouts.layout')

@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Login</h3>
			</div>
			<div class="panel-body">
				<form class="form-vertical" role="form" method="post" action="{{ route('user.login') }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">Email Address</label>
					<input type="text" name="email" class="form-control" id="email" value="">

					@if($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Password</label>
					<input type="password" name="password" class="form-control" id="password" value="">

					@if($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember">Remember me
					</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Sign in</button>
					<a href="{{ route('register') }}">Not a registered User?</a>
				</div>
				
			</form>
			</div>
		</div>
			

@stop