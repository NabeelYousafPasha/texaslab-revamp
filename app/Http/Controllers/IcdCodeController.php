<?php

namespace App\Http\Controllers;

use App\Models\IcdCode;
use Illuminate\Http\Request;

class IcdCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.icd-code.index')->with([
            'icdCodes' => IcdCode::addSelect([
                'code',
                'name',
            ])
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(IcdCode $icdCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IcdCode $icdCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IcdCode $icdCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IcdCode $icdCode)
    {
        //
    }
}
