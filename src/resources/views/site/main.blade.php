@extends('site.layouts.layer')
@section('title', 'Фильмы и сериалы')
@section('main_content')
    <div class="h-full">
        <div class="flex justify-evenly">
            <form action="{{route('films.sort',)}}">
                <div class="flex justify-start">
                    <div class="mb-3 xl:w-96">
                        <select onchange="this.form.submit();" name="genre" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
              border border-solid border-gray-300 rounded transition ease-in-out m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example">
                            <option selected>Выберите жанр</option>
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <form action="{{route('films.sort',)}}">
                <div class="flex justify-start">
                    <div class="mb-3 xl:w-96">
                        <select onchange="this.form.submit();" name="year" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300 rounded transition ease-in-out m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option selected>Выберите фильмы по году</option>
                            @foreach($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>


        <div class="grid xl:grid-cols-6 gap-12 m-12">
            @foreach($films as $film)
                <div class="flex justify-center">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm mb-2">
                        <a href="{{route('films.content.show', ['film' => $film->id])}}">
                            <img class="rounded-t-lg" src="{{ asset("storage/$film->img_path") }}" alt=""/>
                        </a>
                        <div class="p-6">
                            <p class="text-gray-900 text-lg md:text-sm font-medium mb-2">{{$film->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
{{--        <div class="flex justify-evenly">--}}
{{--            {{ $films->appends(['search' => request()->search])->links() }}--}}
{{--        </div>--}}
        <div class="flex justify-evenly">
            {{ $films->withQueryString()->links() }}
        </div>
    </div>
@endsection


