@extends('layouts.default') @section('content')
<div class="flex flex-col flex-wrap justify-center align-middle w-[50%] mx-auto">
    <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Login</h1>
    @if ($errors->has('error'))
    <p class="text-center text-red-500 text-sm p-2">{{ $errors->first('error') }}</p>
    @endif
    <form class="flex flex-col gap-2 bg-gray-100 border border-gray-200 rounded p-2" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="email">Email</label>
            <input class="col-span-3 px-1 py-2" id="email" name="email" type="email" placeholder="juan@email.com" required />
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="password">Password</label>
            <input class="col-span-3 px-1 py-2" id="password" name="password" type="password" placeholder="********" />
        </div>
        <button class="p-2 bg-rose-600 text-slate-50 rounded shadow hover:scale-95" type="submit">Submit</button>
    </form>
</div>
@endsection
