<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('profile', compact('profile'));
    }

    public function update(ProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->only(['name', 'email', 'bio', 'address', 'phone_number', 'gender', 'birthdate']));

        $avatarUrl = $profile->avatar ? asset('storage/' . $profile->avatar) : null;

        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $profile->update(['avatar' => $path]);

            $avatarUrl = asset('storage/' . $path);
        }

        return response()->json([
            'message' => 'Profile updated successfully',
            'avatar_url' => $avatarUrl,
        ]);
    }

}
