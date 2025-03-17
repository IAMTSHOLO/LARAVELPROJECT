<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6'
        ]);

        // Insert into database
        $user = User::create([
            'First_Name' => $request->first_name,
            'Last_Name'  => $request->last_name,
            'Email'      => $request->email,
            'Password'   => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
    }


}
