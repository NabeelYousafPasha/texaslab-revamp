<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Role;

class MenuItemController extends Controller
{
    
    public function create()
    {
        $roles = Role::all();
        $MenuItems = MenuItem::all();
        return view('menu.create',compact('roles','MenuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);
        $menuItem = new MenuItem;
        $menuItem->label = $request->label;
        $menuItem->url = $request->url;
        $menuItem->icon = $request->icon;
        $menuItem->parent = $request->parent;
        $menuItem->roles = implode(',', $request->roles); 
        $menuItem->save();

        return redirect()->route('menu.create')
            ->with('success', 'Menu item created successfully');
    }

}
