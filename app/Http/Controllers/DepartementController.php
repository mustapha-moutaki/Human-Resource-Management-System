<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

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
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
        Departement::create($request->all());

        return redirect()->route('departements.index')->with('success', 'Departement added successfully!');
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
