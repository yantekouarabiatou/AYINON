<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create()
{
    $roles = Role::all(); 
    
    // \Log::info('Les roles:', ['role' => $roles]);
    // return view('auth.register', compact('roles'));
    return view('users.index', compact('roles'));
    dd($roles);
}
}
