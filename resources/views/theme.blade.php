@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Thèmes
            </div>
            <div class="links">
                @if (count($themes) > 0)
                    <form method="post" action="/themes/delete">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Vocabulaire</th>
                                <th scope="col">Action</th>
                            </tr>

                            @foreach($themes as $theme)
                                <tr>
                                    <td class="align-middle">{{$theme->title}}</td>
                                    <!-- Give to the button the value of the ID line -->
                                    <td><button class="btn btn-danger" name="delid" value="{{ $theme->id }}">Supprimer</button></td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                    <form method="post" action="/themes/create">
                        @csrf
                        <div class="form-group">
                            <label for="addlanguage">Thème à ajouter</label>
                            <input type="text" class="form-control" name="addvocabulary" placeholder="Thème"><br>
                            <button type="submit" name="addtheme" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
                    @else
                    </table>
                    </form>
                    <div>Aucun thème disponible</div><br><br>
                    <form method="post" action="/languages/create">
                        @csrf
                        <div class="form-group">
                            <label for="addlanguage">Veuillez rajouter un thème</label>
                            <input type="text" class="form-control" name="addvocabulary" placeholder="Thème"><br>
                            <button type="submit" name="addtheme" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>

                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    jQuery(document).ready(function() {
        jQuery("#this_needs_some_js").somejavascriptplugin();
    });
@stop

