<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestRequest;
use App\Models\{
    IcdCode,
    PanelTest,
    Status, 
    Test,
    TestResultKpi
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

        $form = [
            'id' => 'create_form__test',
            'name' => 'create_form__test',
            'action' => route('admin.tests.store'),
            'method' => 'POST',
        ];
        
        return view('pages.admin.test.form')->with([
            'statuses' => $statuses,
            'icdCodes' => IcdCode::pluck('code', 'id')->toArray(),

            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestRequest $request)
    {
        dd($request->all());
        $this->testService->store($request->validated());

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

        $form = [
            'id' => 'edit_form__test',
            'name' => 'edit_form__test',
            'action' => route('admin.tests.store'),
            'method' => 'POST',

            '_method' => 'PATCH',
        ];
        
        return view('pages.admin.test.form')->with([
            'statuses' => $statuses,
            'icdCodes' => IcdCode::pluck('code', 'id')->toArray(),

            'form' => $form,
            'test' => $test,
            'testIcdCodes' => $test->icd_codes()->pluck('icd_codes.id')->toArray(),
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
        TestResultKpi::where('test_id', '=', $test->id)->delete();
        $test->delete();

        return redirect()->route('admin.tests.index');
    }
}
