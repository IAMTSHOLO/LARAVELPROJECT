<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\User;

class FormController extends Controller

{
    public function showRegistrationForm(Request $request)
    {
        $role = $request->query('role');

        if (!in_array($role, ['client', 'lawyer'])) {
            return redirect()->route('select.role')->with('error', 'Invalid role selected.');
        }

        return view('register', compact('role')); // Show registration form
    }

    public function submitForm(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'user_type' => 'required|in:client,lawyer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'physical_address' => 'required|string|max:255',
            'password' => 'required|string|min:6',

            // Extra fields for Lawyers
            'specialization' => 'required_if:user_type,lawyer|string|max:255',
            'years_of_experience' => 'required_if:user_type,lawyer|integer|min:0',
            'license_number' => 'required_if:user_type,lawyer|string|max:255|unique:users,license_number'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        // Create a new user record in the database
        $user = User::create([
            'user_type' => $request->user_type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'physical_address' => $request->physical_address,
            'password' => bcrypt($request->password),

            // Only if the user is a Lawyer
            'specialization' => $request->user_type === 'lawyer' ? $request->specialization : null,
            'years_of_experience' => $request->user_type === 'lawyer' ? $request->years_of_experience : null,
            
        ]);

        return response()->json(['status' => 'success', 'user' => $user], 200);
    }
}
