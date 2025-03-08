<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departement;
use App\Models\Role;
use App\Models\Grad;
use App\Models\Formation;
use App\Models\Contract;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

// for reset the password
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
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


public function store(Request $request){
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'birthday' => $request->birthday,
        'address' => $request->address,
        'phone' => $request->phone, 
        'status' => $request->status, 
        'assurance' => in_array($request->assurance, ['yes', 'no']) ? $request->assurance : 'no', 
        'CIN' => $request->CIN,
        'CNSS' => $request->CNSS,
        'departement_id' => $request->departement_id,
        // 'role_id' => $request->role_id,
        'contract_id' => $request->contract_id,
        'salary' => $request->salary,
        'reset_token' => Str::random(60),
    ]);
    Mail::to($user->email)->send(new ResetPasswordMail($user));// send email for reset the password
    $user->assignRole($request->role_name);
    // dd($request->role_name);

    return redirect()->route('users.index')->with('success', 'User saved successfully!');
}

    public function showResetForm($token){
        return view('auth.reset_password', compact('token'));
    }

public function updatePassword(Request $request){
    $request->validate([
        'token' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    //search user using the reset tokern
    $user = User::where('reset_token', $request->token)->firstOrFail();

    // update the password and delete the token
    $user->update([
        'password' => bcrypt($request->password),
        'reset_token' => null,
    ]);

    return redirect('/login')->with('success', 'the password updated successfully');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'career_id' => 'nullable|exists:career,id',
            
        ]);
    
      
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }
    
       
        if ($request->has('career_id')) {
            $user->career_id = $request->career_id;
        }
    
        if ($request->has('formations')) {
            $user->formations()->sync($request->formations);
        }
    
        $user->update($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    

    // public function update(UserRequest $request, User $user)
    // {

    //     $data = $request->except('password');

    //     // Hash the new password if provided
    //     if ($request->password) {
    //         $data['password'] = Hash::make($request->password);
    //     }

    //     // $user = User::findOrFail($id);
    //     if ($request->has('formations')) {
    //         $user->formations()->sync($request->formations);
    //     }
    
    
    //     // // Update the user's career_id
    //     // $user->career_id = $request->career_id;
    //     // $user->save();
        
    //     $user->update($data);

    //     return redirect()->route('users.index')->with('success', 'User updated successfully!');
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $careers = Career::all();
        $formations = Formation::all();
        return view('users.show', compact('user', 'careers', 'formations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $contracts = Contract::all();
        $departments = Departement::all();
        $roles = Role::all();
        $grads = Grad::all();
        return view('users.edit', compact('user', 'departments', 'roles', 'grads', 'contracts'));
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
