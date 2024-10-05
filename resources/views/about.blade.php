<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
</head>
<body>
<h1>О нас</h1>
<p>Выбранный город: {{ $selectedCity }}</p>
<p>Здесь будет информация о нашем проекте...</p>

<nav>
    <a href="{{ route('index') }}">Главная</a>
    <a href="{{ route('news') }}">Новости</a>
</nav>
</body>
</html>
