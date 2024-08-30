@extends('layouts.default') @section('content')

<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Delete User</h1>
        <a href="/users" class="px-3 py-2 border border-rose-500 rounded bg-rose-500 hover:bg-rose-400 text-slate-50">Back</a>
    </div>

    <form
        class="flex flex-col gap-2 bg-gray-100 border border-gray-200 rounded p-2"
        action="{{ route('users.destroy', ['id' => $user->id]) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap flex-col gap-4 justify-center items-center">
            <img src="../../../storage/app/{{$user->photo }}" alt="Profile Picture" class="w-24 h-24 rounded-full" />
            <h1 class="text-3xl font-semibold text-gray-800">
                {{ ucfirst($user->prefixname) }} {{ $user->firstname }} {{ $user->middle }} {{ $user->lastname }} {{ $user->suffixname }}
            </h1>

            <p class="p-2">Arer you sure you want to delete me?</p>
        </div>
        <button class="p-2 bg-rose-600 text-slate-50 rounded shadow hover:scale-95" type="submit">Delete</button>
    </form>
</div>

@endsection
