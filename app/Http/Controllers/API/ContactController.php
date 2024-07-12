<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get()->where('user_id', Auth::id());

        if (!$contacts) {
            return response()->json([
                'error' => 'Contacts not found',
            ], 404);
        }

        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'number' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
        ]);

        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        if (Auth::id() !== $contact->user_id) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::where('user_id', Auth::id())->find($id);

        if (!$contact) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'number' => 'required',
        ]);

        $contact->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
        ]);

        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::where('user_id', Auth::id())->find($id);

        if (!$contact) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        $contact->delete();

        return response()->json('Contact deleted');
    }
}
