@extends('admin_panel.layouts.admin_layer')
@section('title')
    Комментарии
@endsection
@section('working_place')
    <div class="max-w-full">
        <div class="grid lg:grid-cols-6 m-12">
            @foreach($comments as $comment)
                <div class="border-2 p-6">
                    <a href="3" class="rounded-t-lg">ID = {{$comment->id}}</a>
                </div>
                <div class="p-6 border-2">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{$comment->user->name}}</h5>
                </div>
                <div class="p-6 border-2">
                    <p class="text-gray-700 text-base mb-4">
                        {{$comment->film->name}}
                    </p>
                </div>
                <div class="p-6 border-2 col-span-2 break-words">
                    <p class="text-gray-700 text-base mb-4 ">
                        {{$comment->description}}
                    </p>
                </div>
                <div class="p-6 border-2">
                    <!-- Button trigger modal -->
                    <button type="button"
                            class="inline-block mb-5 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                        Редактировать
                    </button>

                    <!-- Modal -->
                    <div
                        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                        id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable relative w-auto h-full pointer-events-none">
                            <div
                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                <div
                                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                    <p class="text-xl font-medium leading-normal text-gray-800"
                                       id="exampleModalScrollableLabel">
                                        Текст комментария
                                    </p>
                                    <button type="button"
                                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body relative p-4">
                                    <form action="{{route('admin.comments.publish', ['comment' => $comment->id])}}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex justify-center">
                                            <div class="mb-3 xl:w-96">
                                                <textarea name="description"
                                                          class="form-control block w-full h-56 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                          id="description" rows="3">{{$comment->description}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div
                                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                            <button type="button"
                                                    class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    data-bs-dismiss="modal">
                                                Закрыть
                                            </button>
                                            <button type="submit"
                                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                Сохранить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}" method="POST">
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
        <div class="flex justify-evenly">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
