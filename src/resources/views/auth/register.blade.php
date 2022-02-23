{{--@extends('layouts.app')--}}
@section('title', 'Регистрация')
@extends('site.layouts.layer')
@section('main_content')
    <div class="md:container md:mx-auto mb-20 pb-32 h-screen">
        <div class="flex justify-center">
            <div class="lg:w-1/2">
                <div class="mt-20">
                    <div class="border-blue-200 border-2 bg-blue-100 h-10 uppercase font-bold flex items-center justify-center">{{ __('Регистрация') }}</div>

                    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-6">
                                <label for="name"
                                       class="form-label inline-block mb-2 text-gray-700">{{ __('Имя') }}</label>

                                <input id="name" type="text"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('имя') }}" autocomplete="name" autofocus>

                                @error('name')
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700"
                                     role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-6">
                                <label for="email"
                                       class="form-label inline-block mb-2 text-gray-700">{{ __('Email') }}</label>

                                <input id="email" type="email"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-6">
                                <label for="password"
                                       class="form-label inline-block mb-2 text-gray-700">{{ __('Пароль') }}</label>

                                <input id="password" type="password"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror"
                                       name="password" autocomplete="new-password">

                                @error('password')
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-6">
                                <label for="password-confirm"
                                       class="form-label inline-block mb-2 text-gray-700">{{ __('Подтверждение пароля') }}</label>

                                <div class="form-group mb-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <button type="submit"
                                        class="mb-12 w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
