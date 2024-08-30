@extends('layouts.default') @section('content') @php $option = $user->prefixname; @endphp
<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Update User</h1>
        <a href="/users" class="px-3 py-2 border border-rose-500 rounded bg-rose-500 hover:bg-rose-400 text-slate-50">Back</a>
    </div>
    <form
        class="flex flex-col gap-2 bg-gray-100 border border-gray-200 rounded p-2"
        action="{{ route('users.update', ['id' => $user->id]) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <label class="col-span-1 mr-2 px-1 py-2 text-sm" for="prefixname">Prefix</label>
            <div class="flex flex-row">
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Mr."
                {{ $option === 'Mr.' ? 'checked' : '' }} />
                <p class="px-2 py-2">Mr.</p>
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Ms."
                {{ $option === 'Ms.' ? 'checked' : '' }} />
                <p class="px-2 py-2">Ms.</p>
                <input class="px-4 py-2" id="prefixname" name="prefixname" type="radio" value="Mrs."
                {{ $option === 'Mrs.' ? 'checked' : '' }} />
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
                value="{{ $user->firstname }}"
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
            <input class="col-span-3 px-1 py-2" id="middlename" name="middlename" type="text" value="{{ $user->middlename }}" placeholder="Santos" />
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
                value="{{ $user->lastname }}"
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
            <input class="col-span-3 px-1 py-2" id="suffixname" name="suffixname" value="{{ $user->suffixname}}" type="text" placeholder="Jr" />
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
                value="{{ $user->username }}"
                placeholder="juandcruz"
                disabled="true"
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
                value="{{ $user->email }}"
                placeholder="juan@email.com"
                disabled="true"
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
            <input class="col-span-3 px-1 py-2" id="photo" name="photo" type="file" accept=".jpg,.jpeg,.png" />
        </div>
        @error('photo')
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <span class="col-span-1 mr-2 px-1 py-2 text-sm"></span>
            <div class="col-span-3 px-1 py-2 text-red-500 text-xs mt-1">{{ $message }}</div>
        </div>
        @enderror
        <button class="p-2 bg-rose-600 text-slate-50 rounded shadow hover:scale-95" type="submit">Update</button>
    </form>
</div>

@endsection
