<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        $query = $user->contacts();

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('number', 'like', "%{$search}%");
            });
        }

        $sortField = $request->input('sortField', 'id');
        $sortOrder = $request->input('sortOrder', 'asc');

        $contacts = $query->orderBy($sortField, $sortOrder)->get();

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
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        $user = $request->user();

        $user->contacts()->create($data);

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(404);
        }

        return view('contacts.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(404);
        }

        return view('contacts.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', Rule::unique('contacts')->ignore($contact->id),],
            'number' => ['required', 'regex:/^\+7\d{10}$/', Rule::unique('contacts')->ignore($contact->id),],
        ]);

        if ($contact->user_id !== auth()->id()) {
            abort(404);
        }

        $contact->update($data);

        return redirect('/contacts/' . $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(404);
        }

        $contact->delete();

        return redirect('/contacts');
    }
}
