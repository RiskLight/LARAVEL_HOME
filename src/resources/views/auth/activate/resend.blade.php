@extends('site.layouts.layer')
@section('main_content')
    <div class="md:container md:mx-auto mb-20 pb-32 h-screen">
        <div class="flex justify-center">
            <div class="lg:w-1/2 border-blue-200 border-2 mt-20">
                <div
                    class="border-blue-200 border-2 bg-blue-100 h-10 uppercase font-bold flex items-center justify-center">
                    Отправить повторно письмо активации
                </div>

                <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full">
                    <form method="POST" action="{{ route('auth.activate.resend') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="email"
                                   class="form-label inline-block mb-2 uppercase text-gray-700"></label>
                            <div class="form-group form-check">
                                <input id="email" type="email"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('email') is-invalid @enderror"
                                       name="email" placeholder="Введите свой email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <div
                                    class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group form-check">
                                <button type="submit"
                                        class="mb-6 w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
