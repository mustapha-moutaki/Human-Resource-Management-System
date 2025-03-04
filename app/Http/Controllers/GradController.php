<?php

namespace App\Http\Controllers;

use App\Models\Grad;
use Illuminate\Http\Request;
use App\Http\Requests\GradRequest;

class GradController extends Controller
{
    public function index() 
    {
        $grads = Grad::all();
        return view('grads.index', compact('grads'));
    }

   
    public function create()
    {
        return view('grads.create');
    }

   
    public function store(GradRequest $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'company_name' => 'required|string|max:255',
        ]);
    
       
        $user_id = session('user_id'); 
    
        Grad::create([
            'user_id' => $user_id,
            'name' => $validated['name'], // Use $validated instead of $validatedGrad
            'graduation_date' => $validated['graduation_date'],
            'company_name' => $validated['company_name'],
        ]);
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Graduation Information Saved');
    }
    

    
    public function edit($id)
    {
        $grad = Grad::findOrFail($id);
        return view('grads.edit', compact('grad'));
        
    }
    
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'company_name' => 'required|string|max:255',
        ]);
    
        // Find the existing record
        $grad = Grad::findOrFail($id); // Changed variable name for consistency
    
        // Update the record with validated data
        $grad->update([
            'name' => $request->name,
            'graduation_date' => $request->graduation_date,
            'company_name' => $request->company_name,
        ]);
    
        // Redirect back to the index with a success message
        return redirect()->route('grads.index')->with('success', 'Data updated successfully.');
    }
    

    public function destroy($id)
    {
        $Grad = Grad::findOrFail($id);
        $Grad->delete();

        return redirect()->route('grad.index')->with('success', 'deleted');
    }
}
