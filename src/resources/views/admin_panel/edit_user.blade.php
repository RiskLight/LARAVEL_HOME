@extends('admin_panel.layouts.admin_layer')

@section('title', "Редактировать юзера $user->name")

@section('working_place')
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full h-screen">
        <form action="{{route('admin.users.update', ['user' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-6">
                <input type="text" name="name"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="name" value="{{$user->name}}">
                @error('name')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <input type="text" name="email"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="film_path" value="{{$user->email}}">
                @error('email')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-6">
                <select name="role_id"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    @foreach($roles as $role)
                        <option
                            {{$role->id === $user->role_id ? 'selected' : ''}}
                            value="{{$role->id}}">{{$role->role}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Сохранить
            </button>
        </form>
    </div>
@endsection
