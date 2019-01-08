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
                Administration
            </div>

            <div class="links">
                <a href="/">Home</a>

                @if (count($things) > 0)
                    <form method="post" action="/admin/kill">
                        <!--We need this TOKEN to have acces to the controller. if not, Error 419 -->
                        @csrf
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>#Briques</th>
                                <th>Couleur</th>
                            </tr>

                            @foreach($things as $thing)
                                <tr>
                                    <td><a href="admin/hide/{{$thing->id}}">{{$thing->name}}</a></td>
                                    <td>{{$thing->nbBricks}}</td>
                                    <td>
                                        @foreach($thing->color as $color)
                                            <span>{{$color->name}}</span>
                                        @endforeach
                                    </td>
                                    <!-- Give to the button the value of the ID line -->
                                    <td><button name="delid" value="{{ $thing->id }}">Supprimer</button></td>
                                </tr>
                            @endforeach
                            <form method="post" action="/admin/create">
                                @csrf
                                <tr>
                                    <td><input type="text" name="id"></td>
                                    <td><input type="text" name="name"></td>
                                    <td><input type="text" name="nbBricks"></td>
                                    <td><input type="text" name="color"></td>
                                    <td><input type="submit" name="create" value="Créer"></td>
                                </tr>
                            </form>
                            @else
                                <div>On a aucune choses</div>
                        </table>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection

