@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>
            @lang('common.genre')
            <small>
                @lang('common.index')
                <a class="btn btn-xs btn-primary" href="{{{ route('admin.genres.create') }}}">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </small>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>@lang('common.id')</th>
                <th>@lang('common.name')</th>
                <th>@lang('common.nr-songs')</th>
                <th>@lang('common.updated_at')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($genres as $genre)
            <tr>
                <td>{{{ $genre->id }}}</td>
                <td>{{{ $genre->name }}}</td>
                <td>{{{ $genre->songs()->count() }}}</td>
                <td>{{{ $genre->updated_at }}}</td>
                <td>
                    <a href="{{{ route('admin.genres.edit', $genre->id) }}}" class="btn btn-default btn-xs" title="@lang('common.edit')">
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
        {{ $genres->links() }}
    </div>
</div>
@stop
