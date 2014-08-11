<ul class="nav nav-pills nav-stacked">
    <li class="{{ setActive('admin.artists.index') }}">
        <a href="{{{ route('admin.artists.index') }}}">
            @lang('common.artists')
        </a>
    </li>
    <li class="{{ setActive('admin.genres.index') }}">
        <a href="{{{ route('admin.genres.index') }}}">
            @lang('common.genres')
        </a>
    </li>
    <li class="{{ setActive('admin.record-labels.index') }}">
        <a href="{{{ route('admin.record-labels.index') }}}">
            @lang('common.record-labels')
        </a>
    </li>
    <li class="{{ setActive('admin.songs.index') }}">
        <a href="{{{ route('admin.songs.index') }}}">
            @lang('common.songs')
        </a>
    </li>
</ul>
