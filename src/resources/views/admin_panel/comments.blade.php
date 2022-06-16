@extends('admin_panel.layouts.admin_layer')
@section('title', 'Комментарии')
@section('working_place')
    <div class="max-w-full h-full">
        <div class="grid lg:grid-cols-6 m-12">

            @foreach($comments as $comment)
                @if(isset($comment))
                    @include('admin_panel.modal_admin')
                @endif
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
                    <a class="cursor-pointer inline-block mb-5 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-toggle="modal" data-bs-target="#exampleModalScrollable_{{$comment->id}}"
                       data-action="{{ route('admin.comments.update', ['film' => $comment->film->id, 'comment' => $comment->id]) }}">
                        Редактировать
                    </a>

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
@section('script_admin')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="{{asset('modal.js')}}"></script>
@endsection
