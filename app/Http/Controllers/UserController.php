<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->except('password');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

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
// this for reback the user after removing it
public function restore($id)
{
    $user = User::withTrashed()->find($id);
    $user->restore();
    return redirect()->route('users.index')->with('success', 'User restored successfully!');
}
}
