<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->get();
        $data['admin'] = $admin;
        return view('layouts.admin.data_admin.dataadmin', $data);
    }

    public function create()
    {
        return view('layouts.admin.data_admin.dataadmin_create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([ 
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8', // Adjust validation as needed
            'role' => 'required|in:admin,pengguna',
        ]);

        // Hash the password before storing it
        $hashedPassword = bcrypt($validatedData['password']);

        // Create a new DataAdmin instance and save it
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'role' => $validatedData['role'],
        ]);

        // Redirect or return a response
        return redirect()->route('layouts.admin.data_admin.dataadmin');
    }
}
