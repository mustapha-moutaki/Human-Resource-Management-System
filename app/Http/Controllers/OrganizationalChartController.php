<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class OrganizationalChartController extends Controller
{
    public function index()
    {
       
        $users = User::all();
        return view('organizational.index', compact('users'));
    }
}
