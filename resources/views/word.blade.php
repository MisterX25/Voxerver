@extends('layout')
@section('content')
    <div>
        <div class="content">
            <div class="title m-b-md">
                Le vocabulaire : {{$theme->title}}
            </div>
            <div class="links">
            </div>
            <div class="tablewords">
                <table class="table table-hover">
                    <tr>
                    @foreach($languages as $language)
                        <th scope="col">{{$language->languageName}}</th>
                    @endforeach
                    </tr>
                    @foreach($res as $key => $word)
                        <tr>
                        @foreach($languages as $language)
                        <td>{{$word[$language->id]}}</td>
                        @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    jQuery(document).ready(function() {
        jQuery("#this_needs_some_js").somejavascriptplugin();
    });
@stop

