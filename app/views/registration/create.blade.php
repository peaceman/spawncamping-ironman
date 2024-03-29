@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-6">
		<h1>@lang('common.registration')</h1>

		{{ Form::open(['route' => 'register']) }}

		<!-- Username Form Input -->
		<div class="form-group {{ setHasError($errors, 'username') }}">
			{{ Form::label('username', trans('common.username'), ['class' => 'control-label']) }}
			{{ Form::text('username', null, ['class' => 'form-control']) }}
			@if ($errors->has('username'))
			<span class="help-block">{{ $errors->first('username') }}</span>
			@endif
		</div>

		<!-- Email Form Input -->
		<div class="form-group {{ setHasError($errors, 'email') }}">
			{{ Form::label('email', trans('common.email'), ['class' => 'control-label']) }}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
			@if ($errors->has('email'))
			<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>

		<!-- Password Form Input -->
		<div class="form-group {{ setHasError($errors, 'password') }}">
			{{ Form::label('password', trans('common.password'), ['class' => 'control-label']) }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			@if ($errors->has('password'))
			<span class="help-block">{{ $errors->first('password') }}</span>
			@endif
		</div>

		<!-- Password_confirmation Form Input -->
		<div class="form-group {{ setHasError($errors, 'password_confirmation') }}">
			{{ Form::label('password_confirmation', trans('common.password_confirmation'), ['class' => 'control-label']) }}
			{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			@if ($errors->has('password_confirmation'))
			<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
			@endif
		</div>

		<div class="form-group">
			{{ Form::submit(trans('common.register'), ['class' => 'btn btn-primary']) }}
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop
