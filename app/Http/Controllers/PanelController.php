<?php

namespace App\Http\Controllers;

use App\Models\{
    Panel,
    Status,
};
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panels = Panel::with([
            'status:id,name',
        ])->get();

        return view('pages.admin.panel.index')->with([
            'panels' => $panels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::OfPanel()
                    ->pluck('name', 'id');

        return view('pages.admin.panel.form')->with([
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Panel $panel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panel $panel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panel $panel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panel $panel)
    {
        //
    }
}
