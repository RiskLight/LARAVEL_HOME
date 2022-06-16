<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Письмо</title>
    <style>
        body {
            background-color: #48bb78;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .names {
            text-align: center;
            font-size: 20px;
        }

        .name {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
        }

        .desc {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>В базу добавлен новый фильм</h1>
    <div>
        <p class="name">{{$film->name}}</p>
    </div>
    <div>
        <p class="name">{{$film->year}}</p>
    </div>
    <div>
        <p class="names">Жанры:
            @foreach($film->genres as $genre) {{$genre->name}} @endforeach
        </p>
    </div>
    <div class="desc">
        <p>{{$film->description}}</p>
    </div>
</div>
</body>
</html>

