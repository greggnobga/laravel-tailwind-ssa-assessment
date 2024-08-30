@extends('layouts.default') @section('content')

<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Dashboard</h1>
    @if (session()->get('success') )
    <p class="text-center text-green-500 text-sm p-2">{{ session()->get('success')  }}</p>
    @endif

    <a href="/users">Users</a>
</div>

@endsection
