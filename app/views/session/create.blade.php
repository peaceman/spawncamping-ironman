@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-6">
		<h1>@lang('common.login')</h1>

		@if ($errors->has('credentials'))
		<div class="alert alert-danger" role="alert">{{ $errors->first('credentials') }}</div>
		@endif

		{{ Form::open(['route' => 'login']) }}

		<!-- Username Form Input -->
		<div class="form-group {{ setHasError($errors, 'username') }}">
			{{ Form::label('username', trans('common.username'), ['class' => 'control-label']) }}
			{{ Form::text('username', null, ['class' => 'form-control']) }}
			@if ($errors->has('username'))
			<span class="help-block">{{ $errors->first('username') }}</span>
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

		<div class="form-group">
			{{ Form::submit(trans('common.login'), ['class' => 'btn btn-primary']) }}
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop
