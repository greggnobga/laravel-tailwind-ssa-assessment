<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>

    <body>
        <div class="container mx-auto">
            <header class="bg-rose-500 text-slate-50 px-2 py-4">@include('includes.header')</header>

            <main class="min-h-screen">@yield('content')</main>

            <footer class="bg-rose-400 text-slate-50 px-2 py-4">@include('includes.footer')</footer>
        </div>
        <script src="/public/js/main.js"></script>
    </body>
</html>
