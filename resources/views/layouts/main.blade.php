<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        @yield('title')
    </title>
</head>
<body class="h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                            @auth
                                <a href="/contacts" class="{{ request()->is('contacts') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">My contacts</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @auth
                        <div class="space-x-6 font-bold flex">
                            <div>
                                <button type="button" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <a href="/profile">{{ Auth::user()->name }}</a>
                                </button>
                            </div>
                            <form action="/logout" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log Out</button>
                            </form>

                        </div>
                    @endauth

                    @guest
                        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="hidden sm:ml-6 sm:block">
                                <div class="flex space-x-4">
                                    <a href="{{ route('register') }}" class="{{ request()->is('register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Register</a>
                                    <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Log In</a>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

@yield('content')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var phoneInput = document.getElementById("number");

        phoneInput.addEventListener("input", function(e) {
            var value = e.target.value.replace(/\D/g, '');
            if (value.length === 1 && value !== '7') {
                value = '7' + value;
            }
            if (value.length <= 4) {
                e.target.value = '+' + value;
            } else if (value.length <= 11) {
                e.target.value = '+' + value.slice(0, 1) + value.slice(1, 4) + value.slice(4);
            }
        });
    });
</script>
</body>
</html>
