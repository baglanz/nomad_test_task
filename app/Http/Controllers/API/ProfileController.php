<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    public function update(Request $request, string $id)
    {
        $user = User::where('id', Auth::id())->find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        $data = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'password' => 'nullable', 'string', 'min:6'
        ]);

        $user->name = $data['name'];
        $user->number = $data['number'];

        if ($request->filled('password')) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return response()->json($user);
    }
}
