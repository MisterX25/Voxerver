@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Vocabulaire
            </div>
            <div class="links">
                @if (count($themes) > 0)
                    <div>Veuillez choisir un thème pour charger le vocaublaire</div><br>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choisir un thème
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($themes as $theme)
                                <a class="dropdown-item" href="words/{{$theme->id}}">{{$theme->title}}</a>
                            @endforeach
                        </div>
                    </div><br><br>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
                @else
                    </table>
                    <div>Aucun thème disponible</div><br><br>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
                @endif
            </div>
        </div>
    </div>
@endsection

