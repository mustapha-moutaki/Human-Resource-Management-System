<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formation;
use App\Http\Requests\FormationRequest;

class formationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = formation::all(); // Retrieve all formations
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationRequest $request)
    {
        // Create a new formation
        formation::create($request->validated());

        // Redirect back with success message
        return redirect()->route('formations.index')->with('success', 'formation created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $formation = formation::findOrFail($id);
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formation = formation::findOrFail($id);
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(formationRequest $request, formation $formation)
    {
        $formation->update($request->validated());

        return redirect()->route('formations.index')->with('success', 'formation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'formation deleted successfully!');
    }
}
