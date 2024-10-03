<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class adminController extends Controller
{
    public function adminDash()
    {
        return view('admin.dash.dash');
    }
    public function adminRegister()
    {
        return view('admin.register.register');
    }
    public function adminLogin()
    {
        return view('admin.login.login');
    }
    public function registerInput(Request $request)
    {
        $adminFirstName = $request->input('inputFirstName');
        $adminLastName = $request->input('inputLastName');
        $adminEmail = $request->input('inputEmail');
        $adminPassword = $request->input('inputPassword');

        // Define validation rules
        $rules = [
            'inputFirstName' => 'required|string|max:255',
            'inputLastName' => 'required|string|max:255',
            'inputEmail' => 'required|email|unique:adminuser,email',
            'inputPassword' => 'required|min:8|confirmed',
        ];

        // Define custom messages (optional)
        $messages = [
            'inputEmail.required' => 'The email field is required.',
            'inputEmail.email' => 'The email must be a valid email address.',
            'inputEmail.unique' => 'The email is already taken.',
            'inputPassword.required' => 'The password field is required.',
            'inputPassword.min' => 'The password must be at least 8 characters.',
            'inputPassword.confirmed' => 'The password confirmation does not match.',
        ];

        // Validate the input data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Return validation errors as JSON response
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // If validation passes, proceed with user creation
        try {
            DB::table('adminuser')->insert([
                'fName' => $adminFirstName,
                'lName' => $adminLastName,
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword),
            ]);

            // Return a success response
            return response()->json(['success' => 'Admin created successfully.']);
        } catch (\Exception $e) {
            // Handle errors during insertion
            return response()->json(['error' => 'Failed to create admin.'], 500);
        }
    }
    public function loginInput(Request $request)
    {
        // Define validation rules
        $rules = [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required',
        ];

        // Define custom messages (optional)
        $messages = [
            'inputEmail.required' => 'The email field is required.',
            'inputEmail.email' => 'The email must be a valid email address.',
            'inputPassword.required' => 'The password field is required.',
        ];

        // Validate the input data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Return validation errors as JSON response
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // If validation passes, attempt to log the user in
        $credentials = $request->only('inputEmail', 'inputPassword');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return response()->json(['success' => 'Logged in successfully.']);
        }

        // Authentication failed...
        return response()->json(['error' => 'Invalid email or password.'], 401);
    }

}
