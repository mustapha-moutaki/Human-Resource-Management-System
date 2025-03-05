<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        $deletedDepartements = $this->trashed();
    
        return view('departements.index', compact('departements', 'deletedDepartements'));
    }
    
    public function trashed()
{
    return Departement::withTrashed()->get();
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managerRoleId = Role::where('name', 'manager')->value('id');

        // Fetch users with the manager role
        $managerUsers = User::where('role_id', $managerRoleId)->get();
    
        return view('departements.create', compact('managerUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(DepartementRequest $request){
    //     Departement::create($request->all());

    //     return redirect()->route('departements.index')->with('success', 'Departement added successfully!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager' => 'required|exists:users,id',
        ]);
    
        // Create the new department
        $department = Departement::create([
            'name' => $request->name,
        ]);
    
        $manager = User::find($request->manager);
    
        // If the manager already has a department, you can log or handle it as needed
        if ($manager->departement_id) {
            // Optionally log or perform any action regarding the old department
            // For example, you could notify someone or keep track of the old department
        }
    
        // Assign the new department ID to the manager
        $manager->departement_id = $department->id; // Use 'departement_id' here
        $manager->save();
    
        return redirect()->route('departements.index')->with('success', 'Department created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        return view('departements.show', compact('departement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartementRequest $request, Departement $departement)
    {
        $departement->update($request->all());

        return redirect()->route('departements.index')->with('success', 'Departement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Departement moved to trash successfully!');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $departement = Departement::withTrashed()->find($id);
        $departement->restore();
        return redirect()->route('departements.index')->with('success', 'Departement restored successfully!');
    }
}
