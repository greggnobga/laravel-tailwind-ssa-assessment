@extends('layouts.default') @section('content')

<div class="flex flex-col flex-wrap justify-center align-middle mx-auto">
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-center text-slate-800 px-2 py-4 text-3xl">Soft Deleted Users</h1>
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
                @foreach ($deleted as $user)
                <tr class="border-t border-gray-200 odd:bg-rose-100 even:bg-rose-200">
                    <td class="py-3 px-6 text-gray-800">{{$user->id}}</td>
                    <td class="py-3 px-6 text-gray-800">
                        {{ ucfirst($user->prefixname) }} {{ $user->firstname }} {{ $user->middle }} {{ $user->lastname }} {{ $user->suffixname }}
                    </td>
                    <td class="py-3 px-6 text-gray-800">{{ $user->username }}</td>
                    <td class="py-3 px-6 text-gray-800">{{ $user->email }}</td>
                    <td class="py-3 px-6">
                        <div class="flex flex-row flex-wrap">
                            <!-- <form action="{{ route('users.restore', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <button
                                    type="submit"
                                    class="m-2 px-2 py-1 border border-green-500 rounded bg-green-500 hover:bg-green-400 text-slate-50">
                                    Restore
                                </button>
                            </form>
                            <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="m-2 px-2 py-1 border border-red-500 rounded bg-red-500 hover:bg-red-400 text-slate-50">
                                    Delete
                                </button>
                            </form> -->

                            <form action="{{ route('softDeletes.restore', $user->id) }}" method="POST">
                                @csrf
                                <button
                                    type="submit"
                                    class="m-2 px-2 py-1 border border-green-500 rounded bg-green-500 hover:bg-green-400 text-slate-50">
                                    Restore
                                </button>
                            </form>
                            <form action="{{ route('softDeletes.delete', $user->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="m-2 px-2 py-1 border border-red-500 rounded bg-red-500 hover:bg-red-400 text-slate-50">
                                    Delete Permanently
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
