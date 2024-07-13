@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <div class="bg-gray">
        <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3 place-items-center min-h-screen">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center pb-10 pt-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img.png') }}" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $contact->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $contact->email }}</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $contact->number }}</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="/contacts/{{ $contact->id }}/edit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-5">Edit contact</a>
                        <button type="submit" form="delete-form" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete contact</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/contacts/{{ $contact->id }}" method="post" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endsection
