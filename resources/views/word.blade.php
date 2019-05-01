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
                        <th scope="col" data-idlang="{{ $language->id }}">{{$language->languageName}}</th>
                    @endforeach
                    </tr>
                    @foreach($res as $semantic => $word)
                        <tr>
                        @foreach($languages as $language)
                            @if(isset($word[$language->id]))
                                <td data-idlang="{{ $language->id }}" data-idsem="{{ $semantic }}">{{$word[$language->id]}}</td>
                            @else
                                <td>-</td>
                            @endif
                        @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <form method="post" action="/words/defword/{{$theme->id}}" class="defineword">
            @csrf
                <div class="defword">
                    <div class="selectfirstword">...</div> en <div class="selectlanguage">...</div> est
                    <input type="text" class="defnewword" name="value">
                    <input type="hidden" name="idlang" id="idlang">
                    <input type="hidden" name="idsem" id="idsem">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
            <form method="post" action="/words/addword/{{$theme->id}}" class="addingword">
            @csrf
                <div class="addword">
                    Nouveau mot à ajouter: <input type="text" class="newword" name="value"> en <div class="selectlanguage">...</div>
                    <input type="hidden" name="idlanguage" id="idlanguage">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
            <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/words.js') }}"></script>
    <link href="{{ asset('css/words.css') }}" rel="stylesheet">
@endsection

