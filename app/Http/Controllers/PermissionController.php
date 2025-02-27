<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all(); // Retrieve all permissions
        return view('permissions.index', compact('permissions'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('permissions.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        // The request is already validated by PermissionRequest
    
        // Update the permission with the validated data
        $permission->update([
            'name' => $request->name,  // Update the name field with the new value
        ]);
    
        // Redirect back to the permissions list with a success message
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission->delete(); // Delete the permission
        return redirect()->route('permissions.index');
    }
}
