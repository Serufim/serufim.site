<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <a href="{{route('admin')}}">Перейти в админку</a>
    <a href="{{route('projects.index')}}">Перейти в проекты</a>
    <a href="{{route('projects.create')}}">Создать новый проект</a>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>