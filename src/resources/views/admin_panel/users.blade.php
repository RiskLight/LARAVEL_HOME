@extends('admin_panel.layouts.admin_layer')
@section('title')Пользователи@endsection
@section('working_place')
    <div class="max-w-full h-full">
        <div class="grid lg:grid-cols-6 m-12">
            @foreach($users as $user)
            <div class="border-2 p-6">
                <a href="3" class="rounded-t-lg">ID = {{$user->id}}</a>
            </div>
            <div class="p-6 border-2">
                <h5 class="text-gray-900 text-xl font-medium mb-2">{{$user->name}}</h5>
            </div>
            <div class="p-6 border-2">
                <p class="text-gray-700 text-base mb-4">
                    {{$user->email}}
                </p>
            </div>
            <div class="p-6 border-2">
                <p class="text-gray-700 text-base mb-4">
                    {{$user->role->role}}
                </p>
            </div>
            <div class="p-6 border-2">
                <a href="{{route('admin.users.edit', ['user' => $user->id])}}"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Редактировать
                </a>
            </div>
            <div class="p-6 border-2">
                <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST">
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
        <div class="text-center text-green-800 text-6xl m-12">
            <a href="{{route('admin.users.create')}}"
               class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Добавить пользователя
            </a>
        </div>
        <div class="flex justify-evenly">
            {{ $users->links() }}
        </div>
    </div>
@endsection
