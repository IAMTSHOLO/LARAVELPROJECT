<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'First_Name' => 'required|string|max:255',
            'Last_Name' => 'required|string|max:255',
            'Date_of_Birth' => 'required|date',
            'Physical_Address' => 'required|string|max:255',
            'Phone_Number' => 'required|string|max:20|unique:users,Phone_Number',
            'Email' => 'required|string|email|max:255|unique:users,Email',
            'Password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
           
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'Date_of_Birth' => $request->Date_of_Birth,
            'Physical_Address' => $request->Physical_Address,
            'Phone_Number' => $request->Phone_Number,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            
        ]);

        if (!$user) {
            return response()->json(['message' => 'Client registration failed. Please try again.'], 500);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Client registration successful!',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function registerLawyer(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'First_Name' => 'required|string|max:255',
            'Last_Name' => 'required|string|max:255',
            'Date_of_Birth' => 'required|date',
            'Physical_Address' => 'required|string|max:255',
            'Phone_Number' => 'required|string|max:20|unique:users,Phone_Number',
            'Email' => 'required|string|email|max:255|unique:users,Email',
            'Password' => 'required|string|min:8',
            'Specialization' => 'required|string|max:255',
            'Years_of_experience' => 'required|integer|min:0',
           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'Date_of_Birth' => $request->Date_of_Birth,
            'Physical_Address' => $request->Physical_Address,
            'Phone_Number' => $request->Phone_Number,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Specialization' => $request->Specialization,
            'Years_of_experience' => $request->Years_of_experience,
           
        ]);

        if (!$user) {
            return response()->json(['message' => 'Lawyer registration failed. Please try again.'], 500);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Lawyer registration successful!',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Email' => 'required|string|email',
            'Password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('Email', $request->Email)->first();

        if (!$user || !Hash::check($request->Password, $user->Password)) {
            return response()->json(['message' => 'Invalid credentials. Please provide valid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful!',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'role' => $user->role
        ], 200);
    }
}
