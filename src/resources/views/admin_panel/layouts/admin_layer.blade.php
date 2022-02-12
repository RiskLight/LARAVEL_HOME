<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <title>@yield('title')</title>
</head>
<body>
<nav
    class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">
    <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
        <div class="container-fluid">
            <a class="text-xl text-black font-semibold hover:text-blue-700" href="{{route('films.site')}}">На сайт</a>
        </div>
        <div class="container-fluid">
            <a class="text-xl text-black font-semibold hover:text-blue-700" href="#">Выход</a>
        </div>
    </div>
</nav>
<div>
    <div>
        <div class="flex items-center justify-center">
            <div class="inline-flex" role="group">
                <a href="{{route('admin.films.index')}}" class="cursor-pointer rounded-l px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Фильмы
                </a>
                <a href="{{route('admin.films.create')}}" class="cursor-pointer px-6 py-2 border-t-2 border-b-2 border-r border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Добавить фильм
                </a>
                <a href="{{route('admin.users.index')}}" class="cursor-pointer px-6 py-2 border-t-2 border-b-2 border-l border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Пользователи
                </a>
                <a href="{{route('admin.comments.index')}}" class="cursor-pointer rounded-r px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Комментарии
                </a>
            </div>
        </div>
    </div>
</div>
@yield('working_place')
<footer class="text-center lg:text-left bg-gray-100 text-gray-600">
    <div class="text-center p-6 bg-gray-200">
        <span>© 2021 Copyright:</span>
        <a class="text-gray-600 font-semibold" href="https://tailwind-elements.com/">Тут какой-то текст</a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>
