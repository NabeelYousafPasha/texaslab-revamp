<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\PanelRequest;
use App\Models\{
    Panel,
    PanelTest,
    Status,
    Test,
};
use App\Services\PanelService;
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

        $form = [
            'id' => 'create_form__panel',
            'name' => 'create_form__panel',
            'action' => route('admin.panels.store'),
            'method' => 'POST',
        ];

        return view('pages.admin.panel.form')->with([
            'statuses' => $statuses,
            'tests' => $tests,

            'form' => $form,
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
        $statuses = Status::OfPanel()
                    ->pluck('name', 'id');
        
        $tests = Test::pluck('name', 'id');

        $panelTests = PanelTest::where('panel_id', '=', $panel->id)
                ->pluck('test_id');

        $form = [
            'id' => 'edit_form__panel',
            'name' => 'edit_form__panel',
            'action' => route('admin.panels.update', ['panel' => $panel]),
            'method' => 'POST',
            
            '_method' => 'PATCH',
        ];

        return view('pages.admin.panel.form')->with([
            'statuses' => $statuses,
            'tests' => $tests,

            'panel' => $panel,
            'panelTests' => $panelTests->toArray(),
            'form' => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PanelRequest $request, Panel $panel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panel $panel)
    {
        PanelTest::where('panel_id', '=', $panel->id)->delete();
        $panel->delete();

        return redirect()->route('admin.panels.index');
    }
}
