<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\ConsentStoreRequest;
use App\Http\Requests\Back\ConsentUpdateRequest;
use App\Models\Consent;
use App\Models\Employee;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consents = Consent::byCompany()->with('employee')->whereHas('employee', function ($query) {
            $query->department();
        })->get();
        $employees = Employee::byCompany()->department()->get();
        $modals = ['create' => ['name', 'employee_id', 'starting_at', 'finished_at'], 'edit' => ['update_name', 'update_employee_id', 'update_starting_at', 'update_finished_at']];
        return view('back.pages.consent.index', compact('consents', 'modals', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsentStoreRequest $request)
    {
        foreach ($request->employee_id as $id) {
            Consent::query()->create([
                'name' => $request->name,
                'employee_id' => $id,
                'company_id' => auth()->user()->company_id,
                'starting_at' => $request->starting_at,
                'finished_at' => $request->finished_at
            ]);
        }

        return redirect()->back()->with(['success' => 'İzin başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consent = Consent::query()->with('employee')->where('id', $id)->first();
        return response()->json([
            'consent' => $consent
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ConsentUpdateRequest $request, string $id)
    {
        $consent = Consent::query()->where('id', $id)->firstOrFail();
        $consent->update([
            'name' => $request->update_name,
            'starting_at' => $request->update_starting_at,
            'finished_at' => $request->update_finished_at
        ]);

        return redirect()->back()->with(['success' => 'İzin başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consent = Consent::query()->where('id', $id)->firstOrFail();
        $consent->delete();
        return redirect()->back()->with(['success' => 'İzin başarıyla silindi.']);
    }
}
