@extends('layouts.main')

@section('title', 'Contacts')

@section('content')
    <div class="relative overflow-x-auto shadow-md">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <div class="px-4 py-5 sm:px-6">
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Your contacts list</p>
            </div>
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <form action="{{ route('contacts.index') }}" method="GET">
                        <input type="text" name="q" id="table-search" value="{{ request('q') }}" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </form>
                </div>
                <div class="relative">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/contacts/create">Add contact</a></button>
                </div>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        #
                        <a href="{{ route('contacts.index', array_merge(request()->query(), ['sortField' => 'id', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Name
                        <a href="{{ route('contacts.index', array_merge(request()->query(), ['sortField' => 'name', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05а2.123 2.123 0 0 0 3.472 0l3.427-5.05а1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Email
                        <a href="{{ route('contacts.index', array_merge(request()->query(), ['sortField' => 'email', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05а2.123 2.123 0 0 0 3.472 0l3.427-5.05а1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087З"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Number
                        <a href="{{ route('contacts.index', array_merge(request()->query(), ['sortField' => 'number', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952а1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086З"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Actions
                    </div>
                </th>
            </tr>
            </thead>
            @foreach($contacts as $contact)
                <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $contact->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $contact->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->number }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="relative inline-block">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline mr-4">Show</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>

@endsection
