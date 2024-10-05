<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
<h1>Текущий город: {{ $selectedCity }}</h1>

<h2>Список городов:</h2>
<ul>
    @foreach($cities as $city)
        <li>
            <a href="{{ route('city.show', ['city' => Str::slug($city['name'])]) }}">
                    <span @if($selectedCity == Str::slug($city['name'])) style="font-weight: bold;" @endif>
                        {{ $city['name'] }}
                    </span>
            </a>
        </li>
    @endforeach
</ul>

<nav>
    <a href="{{ route('about') }}">О нас</a>
    <a href="{{ route('news') }}">Новости</a>
</nav>
</body>
</html>
