<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::find(Auth::user());

        return view('profiles.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find(Auth::user());

        return view('profiles.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profileAttributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $profileAttributes['name'];
        $user->number = $profileAttributes['number'];

        if ($request->filled('password')) {
            $user->password = bcrypt($profileAttributes['password']);
        }

        $user->save();

        return redirect('/profiles');
    }
}
