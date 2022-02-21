@extends('site.layouts.layer')

@section('title', 'Избранное')

@section('main_content')
    <div class="grid xl:grid-cols-6 gap-12 m-12">
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#">
                        <img class="rounded-t-lg" src="https://drive.google.com/uc?export=view&id=1OslAwJ97I7tIa1DXCqV7pyOVR7d3yNCZ" alt=""/>
                    </a>
                    <div class="p-6">
                        <p class="text-gray-900 text-xl  font-medium mb-2">Название фильма</p>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Удалить из избранного
                        </button>
                    </form>
                </div>
            </div>

    </div>
@endsection
