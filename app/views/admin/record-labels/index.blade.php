@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>
            @lang('common.record-label')
            <small>
                @lang('common.index')
                <a class="btn btn-xs btn-primary" href="{{{ route('admin.record-labels.create') }}}">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </small>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>@lang('common.id')</th>
                <th>@lang('common.name')</th>
                <th>@lang('common.logo_filename')</th>
                <th>@lang('common.updated_at')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($recordLabels as $recordLabel)
            <tr>
                <td>{{{ $recordLabel->id }}}</td>
                <td>{{{ $recordLabel->name }}}</td>
                <td>{{{ $recordLabel->logo_filename }}}</td>
                <td>{{{ $recordLabel->updated_at }}}</td>
                <td>
                    <a href="{{{ route('admin.record-labels.edit', $recordLabel->id) }}}" class="btn btn-default btn-xs" title="@lang('common.edit')">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">@lang('common.no-entries')</td>
            </tr>
            @endforelse
            </tbody>
        </table>
        {{ $recordLabels->links() }}
    </div>
</div>
@stop
