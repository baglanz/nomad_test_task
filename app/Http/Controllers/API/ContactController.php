<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();

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
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        $user = $request->user();

        $user->contacts()->create($data);

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        if ($contact->user_id !== auth()->id()) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        $contact->delete();

        return response()->json('Contact deleted');
    }
}
