<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Voxserver</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content text-sm-left">
        <div class="title m-b-md text-center">
            Vox Server
        </div>

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <a href="/languages" class="card-link"><h4 class="card-title text-center">Langues</h4></a>
                    <p class="card-text text-center">Les langues disponibles sur le serveur.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/themes" class="card-link"><h4 class="card-title text-center">Thèmes</h4></a>
                    <p class="card-text text-center">Les thèmes disponibles sur le serveur.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/vocabularies" class="card-link"><h4 class="card-title text-center">Mots</h4></a>
                    <p class="card-text text-center">Les mots qui sont enregistrés sur le serveur.</p>
                </div>
            </div>
        </div>
        <!--
        <h4>Points d'appel</h4>
        <table style="text-align: left">
            <tr>
                <td style="padding: 5px">Liste des langues</td>
                <td style="padding: 5px">api/v1/languages</td>
            </tr>
            <tr>
                <td style="padding: 5px">Liste des vocabulaires</td>
                <td style="padding: 5px">api/v1/vocs</td>
            </tr>
            <tr>
                <td style="padding: 5px">Liste des vocabulaires avec leurs mots</td>
                <td style="padding: 5px">api/v1/fullvocs</td>
            </tr>
            <tr>
                <td style="padding: 5px">Liste des vocabulaires avec les langues X et Y (id)</td>
                <td style="padding: 5px">api/v1/vocs/X/Y</td>
            </tr>
            <tr>
                <td style="padding: 5px">Contenu d'un vocabulaire précis</td>
                <td style="padding: 5px">api/v1/voc/{id}</td>
            </tr>
            <tr>
                <td style="padding: 5px">Liste des devoirs d'un élève</td>
                <td style="padding: 5px">api/v1/assignments/{token}</td>
            </tr>
            <tr>
                <td style="padding: 5px">Retour de résultat (POST)</td>
                <td style="padding: 5px">api/v1/result</td>
                <td style="padding: 5px">id : of the assignment (NOT the vocabulary!)<br>token : authenticates the user<br>result : score</td>
            </tr>
        </table>
        -->
    </div>
</div>
</body>
</html>
