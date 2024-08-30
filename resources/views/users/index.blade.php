@extends('layouts.default') @section('content')

<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">List Of Users</h1>
        <a href="/users/create" class="m-2 px-2 py-1 border border-rose-500 rounded bg-rose-500 hover:bg-rose-400 text-slate-50">Add User</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-rose-200 border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-rose-400 text-white">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Full Name</th>
                    <th class="py-3 px-6 text-left">Username</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-t border-gray-200 odd:bg-rose-50 even:bg-rose-100">
                    <td class="py-3 px-6 text-gray-800">{{$user->id}}</td>
                    <td class="py-3 px-6 text-gray-800">
                        {{ ucfirst($user->prefixname) }} {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }} {{ $user->suffixname }}
                    </td>
                    <td class="py-3 px-6 text-gray-800">{{ $user->username }}</td>
                    <td class="py-3 px-6 text-gray-800">{{ $user->email }}</td>
                    <td class="py-3 px-6">
                        <a
                            href="{{ route('users.show', ['id' => $user->id]) }}"
                            class="m-2 px-2 py-1 border border-green-500 rounded bg-green-500 hover:bg-green-400 text-slate-50">
                            View
                        </a>
                        <a
                            href="{{ route('users.update', ['id' => $user->id]) }}"
                            class="m-2 px-2 py-1 border border-sky-500 rounded bg-sky-500 hover:bg-sky-400 text-slate-50">
                            Edit
                        </a>
                        <a
                            href="{{ route('users.destroy', ['id' => $user->id]) }}"
                            class="m-2 px-2 py-1 border border-red-500 rounded bg-red-500 hover:bg-red-400 text-slate-50">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
