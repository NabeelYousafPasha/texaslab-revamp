<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestRequest;
use App\Models\{
    PanelTest,
    ResultKpi,
    Status, 
    Test
};
use App\Services\TestService;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{

    protected $testService;

    /**
     *
     * @param TestService $testService
     */
    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::with([
            'status:id,name',
        ])->get();

        return view('pages.admin.test.index')->with([
            'tests' => $tests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::OfTest()
                    ->pluck('name', 'id');

        $resultKpis = ResultKpi::ofTest()
                    ->pluck('name', 'id');

        $form = [
            'id' => 'create_form__test',
            'name' => 'create_form__test',
            'action' => route('admin.tests.store'),
            'method' => 'POST',
        ];
        
        return view('pages.admin.test.form')->with([
            'statuses' => $statuses,
            'resultKpis' => $resultKpis,

            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestRequest $request)
    {
        $test = $this->testService->store($request->validated());
        $this->testService->syncTestResultKpis($test, $request->validated('test_result_kpis'));

        return redirect()->route('admin.tests.index', [], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        $statuses = Status::OfTest()
                    ->pluck('name', 'id');

        $resultKpis = ResultKpi::ofTest()
                    ->pluck('name', 'id');

        $form = [
            'id' => 'edit_form__test',
            'name' => 'edit_form__test',
            'action' => route('admin.tests.store'),
            'method' => 'POST',

            '_method' => 'PATCH',
        ];
        
        return view('pages.admin.test.form')->with([
            'statuses' => $statuses,
            'resultKpis' => $resultKpis,

            'test' => $test,
            'form' => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        PanelTest::where('test_id', '=', $test->id)->delete();
        $test->delete();

        return redirect()->route('admin.tests.index');
    }
}
