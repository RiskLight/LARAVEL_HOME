@extends('admin_panel.layouts.admin_layer')

@section('title', "Редактировать фильм $film->name")

@section('working_place')
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-full">
        <form action="{{route('admin.films.update', ['film' => $film->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-6">
                <input type="text" name="name"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="name" value="{{$film->name}}">
                @error('name')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <input type="text" name="film_path"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="film_path" value="{{$film->film_path}}">
                @error('film_path')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <input type="file" name="img_path"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="img_path" value="{{$film->img_path}}">
            </div>
            <div class="form-group mb-6">
                <input type="text" name="year"
                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="year" value="{{$film->year}}">
                @error('year')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <textarea name="description"
                          class="form-control block w-full px-3 py-1.5 ext-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                          id="description" rows="3">{{$film->description}}</textarea>
                @error('description')
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-6">
                <select name="standart"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="standart">
                    @foreach($standarts as $standart)
                        <option
                            {{$standart->id === $film->standart_id ? 'selected' : ''}}
                            value="{{$standart->id}}">{{$standart->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <button type="button"
                        class="mt-8 mb-8 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#exampleModalXl">Жанры
                </button>
            </div>
            <div
                class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
                    <div
                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div
                            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                                Жанры
                            </h5>
                            <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body relative p-4">
                            <div class="grid grid-cols-3">
                                @foreach ($genres as $genre)
                                    <div class="form-check">
                                        <input
                                            {{$film->genres->contains($genre->id) ? 'checked' : ''}}
                                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="checkbox" value="{{$genre->id}}" name="genre[]" id="{{$genre->name}}">
                                        <label class="form-check-label inline-block text-gray-800"
                                               for="{{$genre->name}}">
                                            {{$genre->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @error('genre')
            <div class="border mt-0 mb-20 border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</div>
            @enderror
            <button type="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Сохранить
            </button>
        </form>
    </div>
@endsection
