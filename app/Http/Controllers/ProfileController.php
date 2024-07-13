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
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $profileAttributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'regex:/^\+7\d{10}$/'],
            'password' => ['nullable', 'confirmed', 'string', 'min:6'],
        ]);

        $user = Auth::user();

        $user->name = $profileAttributes['name'];
        $user->number = $profileAttributes['number'];

        if ($request->filled('password')) {
            $user->password = bcrypt($profileAttributes['password']);
        }

        $user->save();

        return redirect('/profile');
    }
}
