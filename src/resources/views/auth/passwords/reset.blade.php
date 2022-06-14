
@extends('site.layouts.layer')
@section('main_content')
<div class="md:container md:mx-auto mb-20 pb-32 h-screen">
    <div class="flex justify-center">
        <div class="lg:w-1/2 border-blue-200 border-2 mt-20">
                <div class="border-blue-200 border-2 bg-blue-100 h-10 uppercase font-bold flex items-center justify-center">Сбросить пароль</div>

                <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-6">
                            <label for="email" class="form-label inline-block mb-2 text-gray-700">{{ __('Email') }}</label>

                            <div class="form-group form-check">
                                <input id="email" type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-6">
                            <label for="password" class="form-label inline-block mb-2 text-gray-700">{{ __('Password') }}</label>

                            <div class="form-group form-check">
                                <input id="password" type="password" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-6">
                            <label for="password-confirm" class="form-label inline-block mb-2 text-gray-700">{{ __('Confirm Password') }}</label>

                            <div class="form-group form-check">
                                <input id="password-confirm" type="password" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror"  name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-6">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mb-6 w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    Установить пароль
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
