<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\HolidayStoreRequest;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        $modals = ['create' => ['name', 'date'], 'edit' => ['update_name', 'update_date']];
        return view('back.pages.holiday.index', compact('holidays', 'modals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HolidayStoreRequest $request)
    {
        Holiday::query()->create([
            'name' => $request->name,
            'company_id' => auth()->user()->company_id,
            'day' => $request->date,
        ]);

        return redirect()->route('tatiller.index')->with(['success' => 'Tatil başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $holiday = Holiday::query()->where('id', $id)->first();
        return response()->json([
            'holiday' => $holiday
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $holiday = Holiday::query()->where('id', $id)->firstOrFail();
        $holiday->update([
            'name' => $request->update_name,
            'day' => $request->update_date
        ]);

        return redirect()->route('tatiller.index')->with(['success' => 'Tatil başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $holiday = Holiday::query()->where('id', $id)->firstOrFail();
        $holiday->delete();
        return redirect()->route('tatiller.index')->with(['success' => 'Tatil başarıyla silindi.']);
    }
}
