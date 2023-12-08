<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->save();


        return redirect()->back()->with('success', 'Permission created successfully');
    }

    public function createPermission(){
        return view('permissions.create');
    }
}
