@extends('layouts.main')

@section('title', 'Edit profile')

@section('content')

    <form method="post" action="/profile" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf

        <h2>Edit profile</h2>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
                <div class="mt-2.5">
                    <input type="text"
                           name="name"
                           id="name"
                           autocomplete="name"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{ $user->name }}"
                           required
                    >
                </div>
                @if($errors->has('name'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('name') }}</p>
                    </div>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label for="number" class="block text-sm font-semibold leading-6 text-gray-900">Number</label>
                <div class="mt-2.5">
                    <input type="tel"
                           name="number"
                           id="number"
                           autocomplete="number"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{ $user->number }}"
                           placeholder="+77771234567"
                           required
                    >
                </div>
                @if($errors->has('number'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('number') }}</p>
                    </div>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label for="number" class="block text-sm font-semibold leading-6 text-gray-900">New password</label>
                <div class="mt-2.5">
                    <input type="password"
                           name="password"
                           id="password"
                           autocomplete="password"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="*not necessary"
                    >
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="number" class="block text-sm font-semibold leading-6 text-gray-900">Confirm new password</label>
                <div class="mt-2.5">
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="password_confirmation"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
        </div>
    </form>
@endsection
