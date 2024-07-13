<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, ProfileService $service)
    {
        $data = $request->validated();

        $user = $request->user();

        $service->update($user, $data);

        return redirect('/profile');
    }
}
