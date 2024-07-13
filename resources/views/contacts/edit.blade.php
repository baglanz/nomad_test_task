@extends('layouts.main')

@section('title', 'Edit contact')

@section('content')
    <form method="post" action="/contacts/{{ $contact->id }}" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PATCH')

        <h2>Edit contact</h2>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
                <div class="mt-2.5">
                    <input type="text"
                           name="name"
                           id="name"
                           autocomplete="name"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{ $contact->name }}"
                           required
                    >
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                <div class="mt-2.5">
                    <input type="email"
                           name="email"
                           id="email"
                           autocomplete="email"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{ $contact->email }}"
                           required
                    >
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="number" class="block text-sm font-semibold leading-6 text-gray-900">Number</label>
                <div class="mt-2.5">
                    <input type="tel"
                           name="number"
                           id="number"
                           autocomplete="number"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{ $contact->number }}"
                           required
                    >
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
        </div>
    </form>
@endsection
