<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\PanelRequest;
use App\Models\{
    Panel,
    Status,
    Test,
};
use App\Services\PanelService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelController extends Controller
{

    protected $panelService;

    /**
     *
     * @param PanelService $panelService
     */
    public function __construct(
        PanelService $panelService
    )
    {
        $this->panelService = $panelService;
    }

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
        
        $tests = Test::pluck('name', 'id');

        return view('pages.admin.panel.form')->with([
            'statuses' => $statuses,
            'tests' => $tests,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PanelRequest $request)
    {
        $panel = $this->panelService->store($request->validated());
        $this->panelService->syncPanelTests($panel, $request->validated('tests'));

        return redirect()->route('admin.panels.index', [], Response::HTTP_CREATED);
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
