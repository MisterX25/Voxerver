@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Langages
            </div>
            <div class="links">
                @if (count($languages) > 0)
                    <form method="post" action="/language/kill">
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>

                            @foreach($languages as $language)
                                <tr>
                                    <td class="align-middle">{{$language->languageName}}</td>
                                    <!-- Give to the button the value of the ID line -->
                                    <td><button class="btn btn-secondary" name="renameid" value="{{ $language->id }}">Renommer</button></td>
                                    <td><button class="btn btn-danger" name="delid" value="{{ $language->id }}">Supprimer</button></td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
                            @else
                                <div>Aucun langage disponible</div>
                        </table>
                    </form>
                @endif

            </div>
        </div>
    </div>

@endsection

