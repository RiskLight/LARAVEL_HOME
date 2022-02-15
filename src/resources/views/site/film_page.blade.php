@extends('site.layouts.layer')
@section('title')
    Фильм
@endsection
@section('main_content')
    <div class="text-6xl text-blue-700 text-center">
        {{$film->name}}
    </div>
    <div class="text-3xl text-blue-500-600 text-center">
       Год выхода: {{$film->year}}
    </div>
    <div class="flex justify-around">
        <iframe src="{{$film->film_path}}" width="1080" height="720" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="text-3xl w-4/6 mr-auto ml-auto flex justify-around">
        <div>{{$film->description}}</div>
    </div>
@endsection
