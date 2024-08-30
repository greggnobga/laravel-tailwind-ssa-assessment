<nav class="flex flex-wrap justify-between">
    <div class="px-2">
        <a class="px-2 hover:text-slate-200" href="/">SSA Assessment</a>
    </div>
    <div class="px-2">
        @if (Auth::check())
        <div class="flex flex-row flex-wrap">
            <a class="px-2 hover:text-slate-200" href="/dashboard">Dashboard</a>
            <a class="px-2 hover:text-slate-200" href="/users">Users</a>
            <a class="px-2 hover:text-slate-200" href="/users/trashed">Trashed</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-2 hover:text-slate-200">Logout</button>
            </form>
        </div>

        @else
        <div class="flex flex-row flex-wrap">
            <a class="px-2 hover:text-slate-200" href="/login">Login</a>
            <a class="px-2 hover:text-slate-200" href="/register">Register</a>
        </div>
        @endif
    </div>
</nav>
