<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
</head>
<body>
<h1>Новости</h1>
<p>Выбранный город: {{ $selectedCity }}</p>
<p>Здесь будут последние новости...</p>

<nav>
    <a href="{{ route('index') }}">Главная</a>
    <a href="{{ route('about') }}">О нас</a>
</nav>
</body>
</html>
