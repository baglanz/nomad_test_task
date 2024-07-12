<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('number', 'like', "%{$search}%");
            });
        }

        $sortField = $request->input('sortField', 'name');
        $sortOrder = $request->input('sortOrder', 'asc');

        $query->orderBy($sortField, $sortOrder);

        $contacts = $query->where('user_id', Auth::user()->id)->get();

        return view('contacts.index', [
            'contacts' => $contacts,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
        ]);

        Auth::user()->contacts()->create($contact);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contacts = Contact::get()->where('id', $id);

        return view('contacts.show', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacts = Contact::get()->where('id', $id);

        return view('contacts.edit', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
        ]);

        Auth::user()->contacts()->where('id', $id)->update($contact);

        return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Auth::user()->contacts()->where('id', $id)->delete();

        return redirect('/contacts');
    }
}
