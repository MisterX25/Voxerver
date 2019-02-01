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
                    @foreach($res as $semantic => $word)
                        <tr>
                        @foreach($languages as $language)
                        <td data-idlang="{{ $language->id }}" data-idsem="{{ $semantic }}">{{$word[$language->id]}}</td>
                        @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <form method="post" action="/defword">
            <div class="addword">
                <div class="selectfirstword">...</div> en <div class="selectlanguage">...</div> est
                <input type="text" class="newword" name="value">
                <input type="hidden" name="idlang" id="idlang">
                <input type="hidden" name="idsem" id="idsem">
                <button type="submit" name="addnewword" class="btn btn-success">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/words.js') }}"></script>
    <link href="{{ asset('css/words.css') }}" rel="stylesheet">
@endsection

