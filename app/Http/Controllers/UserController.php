<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departement;
use App\Models\Role;
use App\Models\Grad;
use App\Models\Formation;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations =Formation::all();
        $users = User::all();
        $deletedUsers = User::onlyTrashed()->get();
        return view('users.index', compact('users', 'deletedUsers','formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        // Fetch other necessary data
        $departments = Departement::all();
        $roles = Role::all();
        $grads = Grad::all();
        $contracts = Contract::all();
    
        return view('users.create', compact('departments', 'roles', 'grads', 'contracts'));
    }
    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'birthday' => $request->birthday,
        'address' => $request->address,
        'phone' => $request->phone, 
        'status' => $request->status, 
        'assurance' => $request->assurance, 
        'CIN' => $request->CIN,
        'CNSS' => $request->CNSS,
        'departement_id' => $request->departement_id,
        'role_id' => $request->role_id,
        'contract_id' => $request->contract_id,
        'salary' => $request->salary,
    ]);
    
    return redirect()->route('users.index')->with('success', 'User saved successfully!');
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
        $departments = Departement::all();
        $roles = Role::all();
        $grads = Grad::all();
        return view('users.edit', compact('user', 'departments', 'roles', 'grads'));
        return redirect()->route('users.index')->with('success', 'User update successfully!');
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
