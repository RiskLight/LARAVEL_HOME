@extends('admin_panel.layouts.admin_layer')

@section('title', 'Добавление пользователя')

@section('working_place')
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full h-screen">
        <form action="{{route('admin.users.store')}}" method="POST">
            @csrf
            <div class="form-group mb-6">
                <input type="text" name="name"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="name" placeholder="Имя пользователя">
                @error('name')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-6">
                <input type="text" name="email"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="film_path" placeholder="Введите email">
                @error('email')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <input type="password" name="password"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Введите пароль">
                @error('password')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <select name="role_id"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="standart">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Добавить юзера
            </button>
        </form>
    </div>
@endsection
