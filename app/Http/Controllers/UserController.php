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

// public function store(Request $request){
//     try {
//         $user = User::create([
        
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'departement_id' => (int) $request->departement_id, 
//             'role_id' => (int) $request->role_id, 
//             'salary' => (float) $request->salary,
//         ]);

//         if ($request->grad_name && $request->graduation_date) {
//             Grad::create([
//                 'grad_name' => $request->grad_name,
//                 'graduation_date' => $request->graduation_date,
//                 'company_name' => $request->company_name,
//             ]);
//             }


//         return redirect()->route('users.index')->with('success', 'User added successfully!');
//     } catch (\Exception $e) {
//         dd($e->getMessage());
//     }
// }

// public function store(Request $request){
//     try {
//         // Create the user
//         $user = User::create([
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'departement_id' => (int) $request->departement_id, 
//             'role_id' => (int) $request->role_id, 
//             'salary' => (float) $request->salary,
//         ]);

//         // Check if grad_name and graduation_date are provided
//         if ($request->grad_name && $request->graduation_date) {
//             // Create the grad record and associate it with the user
//             $grad = new Grad([
//                 'grad_name' => $request->grad_name,
//                 'graduation_date' => $request->graduation_date,
//                 'company_name' => $request->company_name,
//             ]);
//             // Associate the grad with the user by setting the user_id
//             $grad->user_id = $user->id;
//             $grad->save(); // Save the grad record
//         }

//         return redirect()->route('users.index')->with('success', 'User added successfully!');

//     } catch (\Exception $e) {
//         return back()->with('error', 'Error: ' . $e->getMessage());
//     }
// }

// public function store(Request $request)
// {
//     try {
//         // Log incoming request data
//         \Log::info('Incoming Request Data:', $request->all());

//         // Step 1: Create the user record
//         $user = User::create([
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'departement_id' => (int) $request->departement_id, 
//             'role_id' => (int) $request->role_id, 
//             'salary' => (float) $request->salary,
//         ]);

//         // Step 2: Check if grad fields are provided
//         if ($request->grad_name || $request->graduation_date) {
//             // Create the grad record
//             $grad = new Grad([
//                 'grad_name' => $request->grad_name,
//                 'graduation_date' => $request->graduation_date,
//                 'company_name' => $request->company_name,
//             ]);

//             // Associate the grad record with the user
//             $grad->user_id = $user->id;
//             $grad->save();  // Save the grad record

//             // Log the grad record to confirm it was created
//             \Log::info('Created Grad Record:', $grad->toArray());
//         }

//         // Step 3: Redirect with success message
//         return redirect()->route('users.index')->with('success', 'User added successfully!');

//     } catch (\Exception $e) {
//         // Log the error for debugging
//         \Log::error('Error during User and Grad creation:', ['error' => $e->getMessage()]);
//         return back()->with('error', 'Error: ' . $e->getMessage());
//     }
// }

public function store(Request $request){

    $validatedGrad = $request->validate([
        'grad_name' => 'required|string|max:255',
        'graduation_date' => 'required|date',
        'company_name' => 'required|string|max:255',
    ]);

 
    $grad = Grad::create([
        'user_id' => $user_id,
        'name' => $validatedGrad['grad_name'],
        'graduation_date' => $validatedGrad['graduation_date'],
        'company_name' => $validatedGrad['company_name'],
    ]);
   
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'employee_id' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'departement_id' => 'required|exists:departements,id',
        'role_id' => 'required|exists:roles,id',
        'contract_id' => 'required|integer',
        'salary' => 'required|numeric',
    ]);

 
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'employee_id' => $validated['employee_id'],
        'password' => bcrypt($validated['password']),
        'departement_id' => $validated['departement_id'],
        'role_id' => $validated['role_id'],
        'contract_id' => $validated['contract_id'],
        'salary' => $validated['salary'],
    ]);


 
    $user_id = $user->id;


    return redirect()->route('users.index')->with('success', 'User and Graduation Information saved successfully!');

    dd($grad);
    die();
    
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
