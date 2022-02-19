@extends('site.layouts.layer')
@section('title')
    {{$film->name}}
@endsection
@section('main_content')
    <div class="text-6xl text-blue-700 text-center">
        {{$film->name}}
    </div>
    <div class="text-3xl mt-4 text-blue-500-600 text-center">
        Год выхода: {{$film->year}}
    </div>
    <div class="text-3xl text-blue-500-600 text-center">
        Жанры:
        @foreach($film->genres as $genre)
            {{$genre->name}}
        @endforeach
    </div>
    <div class="flex justify-around mt-12">
        <iframe src="{{$film->film_path}}" width="1080" height="720" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="text-2xl w-3/4 mr-auto ml-auto mt-20 flex justify-around">
        <div>{{$film->description}}</div>
    </div>
    <!-- comment form -->
    <div class="flex mt-20 mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 w-3/4">
        <form class="w-full bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Добавьте свой бред</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="body" placeholder="Бредовый текст" required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs md:text-sm pt-px">Я хз зачем здесь какой-то текст</p>
                    </div>
                    <div class="-mr-1">
                        <input type='submit'
                               class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                               value="Добавьте комментарий">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="flex mt-20 mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 w-3/4">
        <div class="p-6 flex flex-col justify-start">
            <h5 class="text-gray-900 text-xl font-medium mb-2">Имя недокоментатора</h5>
            <p class="text-gray-700 text-base mb-4">
                Текст великого кинокритика, очень "умные" мысли о сюжете, концептуальности, проработке главных и
                второстепенных героев.
                Росскази о том, что "вот я то бы" снял лучше, интересные шутки диванного критика. А в целом это просто
                текст, чтобы было
                хоть что-то.
            </p>
            <p class="text-gray-600 text-xs">Дата недокоментария</p>
        </div>
    </div>
@endsection

