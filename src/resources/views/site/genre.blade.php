@extends('site.layouts.layer')
@section('title', 'Фильмы по жанрам')
@section('links')
    <li class="nav-item p-2">
        <a class="nav-link text-white hover:text-blue-700 focus:text-gray-600 p-0"
           href="{{route('films.content.site')}}">Все фильмы</a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link text-white hover:text-blue-700 focus:text-gray-600 p-0"
           href="{{route('films.content.site')}}">Фильмы</a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link text-white hover:text-blue-700 focus:text-gray-600 p-0"
           href="{{route('films.content.site')}}">Сериалы</a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link text-white hover:text-blue-700 focus:text-gray-600 p-0"
           href="{{route('genres.genres')}}">По жанрам</a>
    </li>
@endsection
@section('main_content')
    <div class="grid grid-cols-3 gap-12 m-12">
        @foreach($genres as $genre)
        <div class="flex justify-center">
            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                <a href="{{route('films.content.site', ['standartId' => 'all', 'genreId'=>$genre->id])}}">
                    <img class="rounded-t-lg" src="{{$genre->img_path}}" alt="{{$genre->name}}"/>
                </a>
                <div class="p-6">
                    <p class="text-gray-900 text-xl font-medium mb-2">{{$genre->name}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
