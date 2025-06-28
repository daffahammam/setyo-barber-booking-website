<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar booking dengan filter dan default hari ini
   // Display all users
   public function index()
   {
       $users = User::all();
       return view('users.index', compact('users'));
   }

   // Show the form for creating a new user
   public function create()
   {
       return view('users.create');
   }

   // Store a newly created user
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8',
       ]);

       User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       return redirect()->route('users.index')->with('success', 'User created successfully.');
   }

   // Show the form for editing the specified user
   public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

   // Update the specified user
   public function update(Request $request, $id)
   {
       $user = User::findOrFail($id);

       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
           'password' => 'nullable|string|min:8',
       ]);

       $user->update([
           'name' => $request->name,
           'email' => $request->email,
           'password' => $request->password ? Hash::make($request->password) : $user->password,
       ]);

       return redirect()->route('users.index')->with('success', 'User updated successfully.');
   }

   // Delete the specified user
   public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}


}
