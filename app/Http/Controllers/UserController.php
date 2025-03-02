<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departement;
use App\Models\Role;
use App\Models\Grad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest; // Ensure you have this request validation class

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $deletedUsers = User::onlyTrashed()->get();
        return view('users.index', compact('users', 'deletedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //make sure to add contarct
        $departments = Departement::all();
        $roles = Role::all();
        return view('users.create', compact('departments', 'roles'));
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
{
    try {
        $user = User::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'departement_id' => $request->departement_id,
            'role_id' => $request->role_id,
            'salary' => $request->salary,
        ]);

      
        if ($request->grad_name && $request->graduation_date) {
            $user->grads()->create([
                'grad_name' => $request->grad_name,
                'graduation_date' => $request->graduation_date,
                'company_name' => $request->company_name,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}


    

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->except('password');

        // Hash the new password if provided
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update the user record
        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User moved to trash successfully!');
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully!');
    }
}
