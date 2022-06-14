@extends('site.layouts.layer')
@section('title', 'Избранное')
@section('main_content')
    <div class="h-full">
        <div class="grid xl:grid-cols-6 gap-12 m-12">
            @foreach($films as $film)
                <div class="flex justify-center">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm">
                        <a href="{{route('films.content.show', $film->id)}}">
                            <img class="rounded-t-md"
                                 src="{{ asset("storage/$film->img_path") }}" alt=""/>
                        </a>
                        <div class="p-6">
                            <p class="text-gray-900 text-sm  font-medium mb-2">{{$film->name}}</p>
                        </div>
                        <form action="{{route('films.favorite.destroy', ['film' => $film->id])}}" method="POST" class="flex justify-center mb-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="film_id" value="{{$film->id}}">
                            <button type="submit"
                                    class="px-6 text-sm py-2.5 bg-blue-600 text-white leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-evenly">
            {{ $films->links() }}
        </div>
    </div>
@endsection
