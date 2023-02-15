<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('roles.index', compact('roles', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $role = Role::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Role created successfully');
    }

    public function storePermission(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Permission created successfully');
    }
}
