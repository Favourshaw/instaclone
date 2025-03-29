<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index($userId): View
    {
        $user = User::findOrFail($userId);

        return view('profiles', ['user' => $user]);
    }


    //user profile information update
    public function info(User $user)
    {

        // Authorize the action using Gate
        Gate::authorize('save', $user->profile);

        return view('profile.info', compact('user'));
    }


    public function save(User $user)
    {

        // Ensure the user has a profile
        if (!$user->profile) {
            $user->profile()->create([]); // Create empty profile if none exists
        }

        // Authorize the action
        Gate::authorize('save', $user->profile);

        // Validate input data
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if present
        if (request()->hasFile('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            // Create image manager instance
            $manager = new ImageManager(new Driver());

            // Process the image
            $image = $manager->read(storage_path('app/public/' . $imagePath));
            $image->cover(width: 1000, height: 1000 );
            $image->save(storage_path('app/public/' . $imagePath));
        }

        // Update profile
        $user->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return Redirect::back()->with('success', 'Profile updated successfully.');
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
