@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>
            @lang('common.song')
            <small>
                @lang('common.index')
                <a class="btn btn-xs btn-primary" href="{{{ route('admin.songs.create') }}}">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </small>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>@lang('common.id')</th>
                <th>@lang('common.title')</th>
                <th>@lang('common.artist')</th>
                <th>@lang('common.genre')</th>
                <th>@lang('common.record-label')</th>
                <th>@lang('common.promotion-start')</th>
                <th>@lang('common.promotion-end')</th>
                <th>@lang('common.nr-song-mixes')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($songs as $song)
            <tr>
                <td>{{{ $song->id }}}</td>
                <td>{{{ $song->title }}}</td>
                <td>{{{ $song->artist->name }}}</td>
                <td>{{{ $song->genre->name }}}</td>
                <td>{{{ $song->recordLabel->name }}}</td>
                <td>{{{ $song->promotion_start }}}</td>
                <td>{{{ $song->promotion_end }}}</td>
                <td>{{{ $song->songMixes()->count() }}}</td>
                <td>
                    <a href="{{{ route('admin.songs.edit', $song->id) }}}" class="btn btn-default btn-xs" title="@lang('common.edit')">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">@lang('common.no-entries')</td>
            </tr>
            @endforelse
            </tbody>
        </table>
        {{ $songs->links() }}
    </div>
</div>
@stop
