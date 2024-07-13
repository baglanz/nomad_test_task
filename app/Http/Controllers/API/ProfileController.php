<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user = User::get()->where('id', Auth::id());

        if (!$user) {
            return response()->json([
                'error' => 'Profile not found',
            ], 404);
        }

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request, ProfileService $service)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'regex:/^\+7\d{10}$/'],
            'password' => ['nullable', 'confirmed', 'string', 'min:6'],
        ]);

        $user = $request->user();

        $service->update($user, $data);

        return response()->json($user);
    }
}
