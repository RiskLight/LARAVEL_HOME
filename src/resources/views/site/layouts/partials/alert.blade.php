@if(session('success'))
    <div class="flex justify-around bg-green-100 rounded-md p-3 flex font-bold mt-4 mb-0 text-sm text-green-800 w-3/4 mx-auto">
        {{ session('success') }}
    </div>
@endif
