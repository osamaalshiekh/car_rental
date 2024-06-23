<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.roles.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.roles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.roles.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.roles.index')->with('success', 'User deleted successfully.');
    }


    public function assignRoles(User $user)
    {
        $roles = Role::all();
        return view('admin.roles.assign', compact('user', 'roles'));
    }

    public function updateUserRoles(Request $request, User $user)
    {
        $roleIds = Role::whereIn('name', $request->roles)->pluck('id')->toArray();
        $user->roles()->sync($roleIds);
        return redirect()->route('admin.roles.index')->with('success', 'User roles updated successfully.');
    }
}
