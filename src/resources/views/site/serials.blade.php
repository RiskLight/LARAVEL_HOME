@extends('site.layouts.layer')
@section('title')
    Сераилы
@endsection
@section('main_content')
    <div class="text-green-800 text-center text-4xl">Временная хуета</div>
    <div class="grid grid-cols-3 gap-12 m-12">
        @foreach($genres as $genre)
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!">
                        <img class="rounded-t-lg" src="{{$genre->img_path}}" alt=""/>
                    </a>
                    <div class="p-6">
                        <p class="text-gray-900 text-xl font-medium mb-2">{{$genre->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
