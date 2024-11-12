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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Gebruiker aangepast.'); // Updated redirect route
    }

    public function edit_user($id): View
    {
        $user = User::findOrFail($id); // Fetch the user by ID
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    public function create_user(Request $request): View
    {
        return view('users.create');
    }
    public function store_user(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'], // Added password validation
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->age = $request->input('age');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password')); // Added password
        $user->save();

        return redirect()->route('users.index')->with('success', 'Gebruiker toegevoegd.');
    }



    public function destroy_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Gebruiker verwijderd.');
    }

    // public function destroy_user(Request $request, User $user): RedirectResponse // Renamed method
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     // Removed the line that reassigns $user
    //     // $user = $request->user(); // This line is unnecessary

    //     // Remove connected tables or related data here
    //     // Example: If the user has grades, delete them
    //     $user->grades()->delete(); // Assuming a relationship exists

    //     // Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::route('users.index')->with('status', 'user-deleted'); // Updated redirect route
    // }

    public function index(Request $request): View // Added Request parameter
    {
        $query = $request->input('search'); // Get the search query
        $users = User::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('first_name', 'like', "%{$query}%")
                                 ->orWhere('last_name', 'like', "%{$query}%")
                                 ->orWhere('email', 'like', "%{$query}%");
        })->get(); // Fetch users based on search query

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






























