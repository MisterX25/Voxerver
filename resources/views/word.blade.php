@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Le vocabulaire : {{$theme->title}}
            </div>
            <div class="links">

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    jQuery(document).ready(function() {
        jQuery("#this_needs_some_js").somejavascriptplugin();
    });
@stop

