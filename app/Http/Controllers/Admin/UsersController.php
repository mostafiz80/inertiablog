<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Users/Users', [
            'listusers' => User::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Users/Adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'username' => 'required|string|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('message', 'User ' . $request->name . ' Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'userdata' => User::findOrFail($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
    // Find the user by ID or fail
    $user = User::findOrFail($user);

    // Validate the request data
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user)],
        'username' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($user)],
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
    ]);

    // Update user data
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->username = $validated['username'];

    // Only update password if it is provided
    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    // Save the updated user data and check for success
    if ($user->save()) {
        // Save was successful
        $request->session()->flash('message', 'User ' . $request->name . ' Updated successfully.');
    } else {
        // Save failed
        $request->session()->flash('message', 'User ' . $request->name . ' update failed.');
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        try {


            // Attempt to delete the user
            if ($user->delete()) {
                // Delete was successful
                $request->session()->flash('message', 'User ' . $user->name . ' deleted successfully.');
            } else {
                // Delete failed for unknown reasons
                $request->session()->flash('message', 'User ' . $user->name . ' delete failed.');
            }
        } catch (QueryException $e) {
            // Check if the error is a foreign key constraint violation
            if ($e->getCode() == 23000) {
                // Handle the foreign key constraint violation
                $request->session()->flash('message', 'Cannot delete user ' . $user->name . ' because it is referenced by other records.');
            } else {
                // Handle other possible database errors
                $request->session()->flash('message', 'An error occurred while trying to delete the user: ');
            }
        } catch (\Exception $e) {
            // Handle other possible exceptions
            $request->session()->flash('message', 'An error occurred while trying to delete the user: ');
        }
  
    }
}
