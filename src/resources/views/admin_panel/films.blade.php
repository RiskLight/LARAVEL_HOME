@extends('admin_panel.layouts.admin_layer')
@section('title', 'Список фильмов')
@section('search')
    <div class="flex w-3/4 mx-auto mt-2 mb-2 justify-center">
        <div class="w-full">
            <form action="{{route('admin.search')}}" method="GET">
                <input type="search"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                       id="exampleSearch" name="search" placeholder="Введите название"/>
            </form>
        </div>
    </div>
@endsection
@section('working_place')
    @if($films->isEmpty())
    <div class="flex w-3/4 mx-auto justify-center h-screen">
        <div class="flex flex-col">
            <p class="text-6xl text-red-700 text-center">Ничего не найдено</p>
            <p class="text-6xl text-red-700">Попробуйте еще раз</p>
        </div>
    </div>
    @else
    <div class="max-w-full">
        <div class="grid lg:grid-cols-6 m-12">
            @foreach($films as $film)
                <div class="border-2 p-6">
                    <p class="rounded-t-lg">ID = {{$film->id}}</p>
                </div>
                <div class="border-2 max-w-xs flex items-center justify-center">
                    <img class="rounded-t-lg" src="{{ asset("storage/$film->img_path") }}" alt=""/>
                </div>
                <div class="p-6 border-2">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{$film->name}}</h5>
                </div>
                <div class="p-6 border-2 text-sm">
                        {{$film->description}}
                </div>
                <div class="p-6 border-2">
                    <a href="{{route('admin.films.edit', ['film' => $film->id])}}"
                       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
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
        <div class="flex justify-evenly">
            {{ $films->appends(['search' => request()->search])->links() }}
        </div>
    </div>
    @endif
@endsection
