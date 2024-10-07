<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    /**
     * Update the user's role.
     */
    public function updateRole(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user = $request->user();
        $user->role = $request->input('role');
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'role-updated');
    }
    public function update_user(Request $request, User $user): RedirectResponse // Renamed method
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return Redirect::route('users.index')->with('status', 'user-updated'); // Updated redirect route
    }
    public function edit_user(Request $request, User $user): View
    {
        return view('users.edit', [ // Updated view to match the users edit view
            'user' => $user,
        ]);
    }

    public function destroy_user(Request $request, User $user): RedirectResponse // Renamed method
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('users.index')->with('status', 'user-deleted'); // Updated redirect route
    }

    public function index(): View
    {
        $users = User::all(); // Fetch all users
        return view('users.index', compact('users'));
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
