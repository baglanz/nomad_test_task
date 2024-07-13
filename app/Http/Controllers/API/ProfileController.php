<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Services\ProfileService;
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
    public function store(UpdateProfileRequest $request, ProfileService $service)
    {
        $data = $request->validated();

        $user = $request->user();

        $service->update($user, $data);

        return response()->json($user);
    }
}
