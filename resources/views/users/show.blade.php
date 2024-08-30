@extends('layouts.default') @section('content')

<div class="flex flex-col flex-wrap justify-center items-center mx-auto">
    <div class="flex flex-wrap justify-between items-center w-[100%]">
        <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">User Details</h1>
        <a href="/users" class="px-3 py-2 border border-rose-500 rounded bg-rose-500 hover:bg-rose-400 text-slate-50">Back</a>
    </div>

    <div class="flex flex-row gap-2 bg-gray-100 border border-gray-200 rounded p-2 w-[100%]">
        <img src="../../../storage/app/{{ $avatar }}" alt="Profile Picture" class="w-48 h-40 rounded-full" />
        <div class="ml-6">
            <h1 class="text-3xl font-semibold text-gray-800 py-4">{{ $user->firstname }} {{ $initial }} {{$user->lastname}}</h1>
            <p class="text-gray-600">{{$user->email}}</p>
            <p class="mt-2 text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet nulla at ex pharetra, et dictum sapien viverra.
            </p>
        </div>
    </div>
</div>

@endsection
