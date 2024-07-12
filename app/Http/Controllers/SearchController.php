<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $contact = Contact::where('name', 'like', '%' . request('q') . '%')->get();

        return view('contacts.results', ['contacts' => $contact]);
    }
}
