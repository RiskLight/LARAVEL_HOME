@extends('admin_panel.layouts.admin_layer')
@section('title')Список фильмов
@endsection
@section('working_place')
    <div class="text-center text-green-800 text-5xl">
        Тут что-то будет
    </div>
    <div class="max-w-full">
        <div class="grid lg:grid-cols-6 m-12">
            <div class="border-2 p-6">
                <a href="3" class="rounded-t-lg">ID</a>
            </div>
            <div>
                <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
            </div>
            <div class="p-6 border-2">
                <h5 class="text-gray-900 text-xl font-medium mb-2">Название</h5>
            </div>
            <div class="p-6 border-2">
                <p class="text-gray-700 text-base mb-4">
                    Описание
                </p>
            </div>
            <div class="p-6 border-2">
                <button type="button"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Редактировать
                </button>
            </div>
            <div class="p-6 border-2">
                <button type="button"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Удалить
                </button>
            </div>
        </div>
    </div>
@endsection
