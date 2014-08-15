@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>@lang('common.create-artist')</h1>

        {{ Form::open(['route' => 'admin.artists.store']) }}

        <!-- Name Form Input -->
        <div class="form-group {{ setHasError($errors, 'name') }}">
        	{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        	{{ Form::text('name', null, ['class' => 'form-control']) }}
        	@if ($errors->has('name'))
        	<span class="help-block">{{ $errors->first('name') }}</span>
        	@endif
        </div>

        <div class="form-group">
            {{ Form::submit(trans('common.submit'), ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop
