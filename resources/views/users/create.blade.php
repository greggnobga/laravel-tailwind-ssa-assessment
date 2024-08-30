@extends('layouts.default') @section('content')
<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Create User</h1>
    <form
        class="flex flex-col gap-2 bg-gray-100 border border-gray-200 rounded p-2"
        action="{{ route('users.create') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="prefixname">Prefix</label>
            <div class="flex flex-row">
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Mr." checked />
                <p class="px-2 py-2">Mr.</p>
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Ms." />
                <p class="px-2 py-2">Ms.</p>
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Mrs." />
                <p class="px-2 py-2">Mrs.</p>
            </div>
        </div>
        @error('prefixname')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror

        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="firstname">First Name</label>
            <input
                class="col-span-3 px-1 py-2"
                id="firstname"
                name="firstname"
                type="text"
                value="{{ old('firstname') }}"
                placeholder="Juan"
                required />
        </div>
        @error('firstname')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="middlename">Middle Name</label>
            <input class="col-span-3 px-1 py-2" id="middlename" name="middlename" type="text" value="{{ old('middlename') }}" placeholder="Santos" />
        </div>
        @error('middlename')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="lastname">Last Name</label>
            <input
                class="col-span-3 px-1 py-2"
                id="lastname"
                name="lastname"
                type="text"
                value="{{ old('lastname') }}"
                placeholder="Dela Cruz"
                required />
        </div>
        @error('lastname')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="suffixname">Suffix Name</label>
            <input class="col-span-3 px-1 py-2" id="suffixname" name="suffixname" value="{{ old('suffixname') }}" type="text" placeholder="Jr" />
        </div>
        @error('suffixname')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="username">User Name</label>
            <input
                class="col-span-3 px-1 py-2"
                id="username"
                name="username"
                type="text"
                value="{{ old('username') }}"
                placeholder="juandcruz"
                required />
        </div>
        @error('username')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="email">Email</label>
            <input
                class="col-span-3 px-1 py-2"
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                placeholder="juan@email.com"
                required />
        </div>
        @error('email')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="password">Password</label>
            <input
                class="col-span-3 px-1 py-2"
                id="password"
                name="password"
                type="password"
                value="{{ old('password') }}"
                placeholder="********"
                required />
        </div>
        @error('password')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm">Confirm Password</label>
            <input
                class="col-span-3 px-1 py-2"
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                value="{{ old('password_confirmation') }}"
                placeholder="********"
                required />
        </div>
        @error('confirmpassword')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm" for="confirmpassword"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="photo">Photo</label>
            <input class="col-span-3 px-1 py-2" id="photo" name="photo" type="file" accept=".jpg,.jpeg,.png" value="{{ old('photo') }}" />
        </div>
        @error('photo')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <button class="p-2 bg-rose-600 text-slate-50 rounded shadow hover:scale-95" type="submit">Submit</button>
    </form>
</div>

@endsection
