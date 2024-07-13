<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
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
    public function update(Request $request, ProfileService $service)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'regex:/^\+7\d{10}$/'],
            'password' => ['nullable', 'confirmed', 'string', 'min:6'],
        ]);

        $user = $request->user();

        $service->update($user, $data) ;

        return redirect('/profile');
    }
}
