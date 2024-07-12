@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        @foreach($contacts as $contact)
            <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <div>
                            <a href="{{ $contact->id }}"><h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $contact->name }}</h3></a>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $contact->email }}</p>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $contact->number }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        @endforeach
    </div>
@endsection
