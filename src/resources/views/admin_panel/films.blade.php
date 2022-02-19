@extends('admin_panel.layouts.admin_layer')
@section('title')Список фильмов
@endsection
@section('working_place')
    <div class="max-w-full">
        <div class="grid lg:grid-cols-6 m-12">
            @foreach($films as $film)
                <div class="border-2 p-6">
                    <p class="rounded-t-lg">ID = {{$film->id}}</p>
                </div>
                <div>
                    <img class="rounded-t-lg" src="{{$film->img_path}}" alt=""/>
                </div>
                <div class="p-6 border-2">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{$film->name}}</h5>
                </div>
                <div class="p-6 border-2">
                    <p class="text-gray-700 text-base mb-4">
                        {{$film->description}}
                    </p>
                </div>
                <div class="p-6 border-2">
                    <a href="{{route('admin.films.edit', ['film' => $film->id])}}"
                       class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        Редактировать
                    </a>
                </div>
                <div class="p-6 border-2">
                    <form action="{{ route('admin.films.destroy', ['film' => $film->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Удалить
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
