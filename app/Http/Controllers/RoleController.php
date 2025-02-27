<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all(); // Retrieve all roles
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        // Create a new role
        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        // Redirect back with success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id); 
        return view('roles.show', compact('role'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $role = Role::findOrFail($id);
    //     return view('roles.edit', compact('role'));
    // }  
    public function edit(string $id)
{
    $role = Role::findOrFail($id);
    
    return view('roles.edit', compact('role'));
}
  

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
{
    
    
    
    $role->update($request->validated());
    
    return redirect()->route('roles.index');
}

    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'role deleted successfully!');
    }
}
