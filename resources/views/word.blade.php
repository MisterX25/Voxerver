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
            <div class="addword">
                <div class="selectfirstword">...</div> en <div class="selectlanguage">...</div> est
                <input type="text" class="newword">
                <button type="submit" name="addnewword" class="btn btn-success">Ajouter</button>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/words.js') }}"></script>
    <link href="{{ asset('css/words.css') }}" rel="stylesheet">
@endsection

