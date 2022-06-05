@extends('site.layouts.layer')
@section('title', 'Фильмы и сериалы')
@section('main_content')
    <div class="h-full">
        <div class="grid xl:grid-cols-6 gap-12 m-12">
            @foreach($films as $film)
                <div class="flex justify-center">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm mb-2">
                        <a href="{{route('films.content.show', ['film' => $film->id])}}">
                            <img class="rounded-t-lg" src="{{ asset("storage/$film->img_path") }}" alt=""/>
                        </a>
                        <div class="p-6">
                            <p class="text-gray-900 text-lg md:text-sm font-medium mb-2">{{$film->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-evenly">
            {{ $films->links() }}
        </div>
    </div>
@endsection

