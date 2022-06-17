@extends('site.layouts.layer')
@section('title')
    {{$film->name}}
@endsection
@section('main_content')
    <div class="text-6xl text-blue-700 text-center mt-12 font-bold">
        {{$film->name}}
    </div>
    <div class="text-3xl mt-4 text-blue-500-600 text-center">
        Дата выхода: {{$film->year}}
    </div>
    <div class="text-2xl text-blue-500-600 text-center">
        Жанры:
        <span class="lowercase">@foreach($film->genres as $genre) {{$genre->name}}@endforeach.</span>
    </div>
    <div class="flex justify-around mt-12 mb-12">
        <iframe src="{{$film->film_path}}" class="w-3/4" height="600"
                frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="flex flex-wrap align-baseline justify-between w-3/4 mx-auto">
        <div>
            <form class="w-full bg-white rounded-lg px-4 pt-2" method="POST"
                  action="{{route('films.favorite.store')}}">
                @csrf
                <div class="">
                    <input type="hidden" name="film_id" value="{{$film->id}}">
                    <button type='submit'
                            class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                        Добавить в избранное
                    </button>
                </div>
            </form>
        </div>
        <div class="stars mr-2">
            @if(isset(auth()->user()->id))
                <span id="for-rate" data-set="auth"></span>
            @else
                <span id="for-rate" data-set="no-auth"></span>
            @endif
            <form action="{{route('films.rate.store')}}" class="class">
                <input type="hidden" name="get-rate" content="{{route('films.rate.show', $film->id)}}">
                <input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" class="hide" name="film_id" id="{{$film->id}}" data-set-value="{{$film->id}}">
                <input class="star star-10" id="star-10" type="radio" data-item-value="10" name="star"/>
                <label class="star star-10" for="star-10"></label>
                <input class="star star-9" id="star-9" type="radio" data-item-value="9" name="star"/>
                <label class="star star-9" for="star-9"></label>
                <input class="star star-8" id="star-8" type="radio" data-item-value="8" name="star"/>
                <label class="star star-8" for="star-8"></label>
                <input class="star star-7" id="star-7" type="radio" data-item-value="7" name="star"/>
                <label class="star star-7" for="star-7"></label>
                <input class="star star-6" id="star-6" type="radio" data-item-value="6" name="star"/>
                <label class="star star-6" for="star-6"></label>
                <input class="star star-5" id="star-5" type="radio" data-item-value="5" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" data-item-value="4" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" data-item-value="3" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" data-item-value="2" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" data-item-value="1" name="star"/>
                <label class="star star-1" for="star-1"></label>
            </form>
        </div>
        <div class="mx-8">
            Оценка:
            <span id="exact-rating" class="mt-2 text-3xl"></span>
        </div>
    </div>
    <div id="message" class="hidden xl:w-96 text-xs text-center"></div>
    <div class="text-2xl w-3/4 mx-auto mt-20 flex justify-around">
        <div>{{$film->description}}</div>
    </div>
    @guest
        <div
            class="bg-blue-300 w-1/2 lg:w-1/2 mx-auto mt-12 mb-12 h-20 flex items-center justify-center flex-wrap ">
            <p class="text-lg text-green-800">Комментарии могут оставлять только зарегистрированные пользователи</p>
        </div>
    @else
        <!-- comment form -->
        <div class="mx-auto w-3/4">
            <div class="flex mt-20 mx-auto w-full items-center justify-center shadow-lg mt-56 mx-8 mb-4">
                <form class="w-full bg-white rounded-lg px-4 pt-2" method="POST"
                      action="{{route('films.comments.store', $film->id)}}">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Добавьте свой бред</h2>
                        <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="description" placeholder="Бредовый текст" required></textarea>
                            @error('description')
                            <div
                                class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-full flex items-start md:w-full px-3">
                            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-xs md:text-sm pt-px">Я хз зачем здесь какой-то текст</p>
                            </div>
                            <div class="-mr-1">
                                <button type='submit'
                                        class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                                    Добавьте комментарий
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endguest
    @if(isset($film->comments))
        @foreach($film->comments->sortByDesc('description') as $comment)
            <div class="w-3/4 mx-auto">
                <div class="flex-col mt-6 mx-auto items-center justify-start shadow-lg mt-56 mx-8 mb-1 w-full">
                    <div class="p-6 flex flex-col justify-start">
                        <span class="text-gray-900 text-xl font-medium mb-2">{{$comment->user->name}}</span>
                        <div class="break-words">
                            <p class="text-gray-700 text-base text-lg max-w-full mb-4">
                                {{$comment->description}}
                            </p>
                        </div>
                        <p class="text-gray-600 text-sm">{{$comment->dateAsCarbon->diffForHumans()}}</p>
                    </div>
                    @guest
                        <div></div>
                    @else
                        @if ($comment->user_id === auth()->user()->id)
                            <div class="justify-end">
                                <a class="cursor-pointer inline-block px-6 py-2.5 bg-transparent text-gray-600 underline hover:no-underline text-sm leading-tight rounded focus:shadow-lg focus:outline-none focus:ring-0  transition duration-150 ease-in-out outline-none"
                                   data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{$comment->id}}"
                                   data-action="{{ route('admin.comments.update', ['film' => $comment->film->id, 'comment' => $comment->id]) }}">
                                    Редактировать
                                </a>
                            </div>
                            @include('site.modal')
                        @endif
                    @endguest
                </div>
            </div>
        @endforeach
    @else
        <div></div>
    @endif
@endsection
@section('script')
    <script src="{{asset('fetch.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="{{asset('modal.js')}}"></script>
@endsection

