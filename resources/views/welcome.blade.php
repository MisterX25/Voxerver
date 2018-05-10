<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
        <div class="title m-b-md">
            Vox Server
        </div>
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
                <td style="padding: 5px">Liste des vocabulaires avec les langues X et Y (id)</td>
                <td style="padding: 5px">api/v1/vocs/X/Y</td>
            </tr>
            <tr>
                <td style="padding: 5px">Contenu d'un vocabulaire précis</td>
                <td style="padding: 5px">api/v1/voc/X</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
