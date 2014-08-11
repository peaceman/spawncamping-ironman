@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>
            @lang('common.artist')
            <small>
                @lang('common.index')
                <a class="btn btn-xs btn-primary" href="{{{ route('admin.artists.create') }}}">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </small>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>@lang('common.id')</th>
                <th>@lang('common.name')</th>
                <th>@lang('common.amount-of-songs')</th>
                <th>@lang('common.updated_at')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($artists as $artist)
            <tr>
                <td>{{{ $artist->id }}}</td>
                <td>{{{ $artist->name }}}</td>
                <td>{{{ $artist->songs()->count() }}}</td>
                <td>{{{ $artist->updated_at }}}</td>
                <td>
                    <a href="{{{ route('admin.artists.edit', $artist->id) }}}" class="btn btn-default btn-xs" title="@lang('common.edit')">
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
        {{ $artists->links() }}
    </div>
</div>
@stop
