<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserFormationController extends Controller
{
    public function update(Request $request, $userId)
    {
       
        $validated = $request->validate([
            'formations' => 'array',
            'formations.*' => 'exists:formation,id'
        ]);

       
        $user = User::findOrFail($userId);

        $user->formations()->detach(); 

        if ($request->has('formations')) {
            foreach ($request->formations as $formationId) {
                $user->formations()->attach($formationId); 
            }
        }
        return redirect()->route('users.show', $user->id)->with('success', 'Formations updated successfully!');
    }
}
