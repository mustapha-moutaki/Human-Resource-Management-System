<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

   
    public function create()
    {
        return view('grades.create');
    }

   
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'company_name' => 'required|string|max:255',
        ]);
    
       
        $user_id = session('user_id'); 
    
        Grade::create([
        'user_id' => $user_id,
        'name' => $validatedGrad['grad_name'],
        'graduation_date' => $validatedGrad['graduation_date'],
        'company_name' => $validatedGrad['company_name'],
        ]);
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Graduation Information Saved');
    }
    

    
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit', compact('grade'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'company_name' => 'required|string|max:255',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->name = $request->name;
        $grade->graduation_date = $request->graduation_date;
        $grade->company_name = $request->company_name;
        $grade->save();

        return redirect()->route('grad.index')->with('success', 'data update success');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('grad.index')->with('success', 'deleted');
    }
}
