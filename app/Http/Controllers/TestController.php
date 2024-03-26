<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index() 
    {
        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => hash::make($request->password),
        ]);
       
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
        ]);
    }
}
