@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('layouts.partials.admin.nav')
    </div>
    <div class="col-md-10">
        @yield('content')
    </div>
</div>
@overwrite
