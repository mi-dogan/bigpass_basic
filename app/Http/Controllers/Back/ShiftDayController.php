<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\back\ShiftDayStoreRequest;
use App\Http\Requests\Back\ShiftDayUpdateRequest;
use App\Models\Shift;
use App\Models\ShiftDay;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\queue;

class ShiftDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $shift = Shift::query()->with('days')->where('id', $id)->firstOrFail();
        $days = ShiftDay::query()->where('shift_id', $shift->id)->orderBy('type', 'asc')->get();
        $modals = ['create' => ['type', 'morning_entrance', 'morning_exit', 'noon_entrance', 'noon_exit', 'option'], 'edit' => ['update_type', 'update_morning_entrance', 'update_morning_exit', 'update_noon_entrance', 'update_noon_exit', 'update_option']];
        return view('back.pages.shift.day', compact('shift', 'modals', 'days'));
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
    public function store(ShiftDayStoreRequest $request, string $id)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();
        ShiftDay::query()->create([
            'company_id' => auth()->user()->company_id,
            'type' => $request->type,
            'morning_entrance' => $request->morning_entrance,
            'morning_exit' => $request->morning_exit,
            'noon_entrance' => $request->noon_entrance,
            'noon_exit' => $request->noon_entrance,
            'option' => $request->option,
            'shift_id' => $shift->id
        ]);

        return redirect()->route('gunler.index', $shift->id)->with(['success' => 'Gün başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $day)
    {
        $day = ShiftDay::query()->where('id', $day)->first();
        return response()->json([
            'day' => $day
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftDayUpdateRequest $request, string $id, string $day)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();
        $day = ShiftDay::query()->where('id', $day)->firstOrFail();
        $day->update([
            'morning_entrance' => $request->update_morning_entrance,
            'morning_exit' => $request->update_morning_exit,
            'noon_entrance' => $request->update_noon_entrance,
            'noon_exit' => $request->update_noon_exit,
            'option' => $request->update_option,
        ]);

        return redirect()->route('gunler.index', $shift->id)->with(['success' => 'Gün başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $day)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();
        $day = ShiftDay::query()->where('id', $day)->firstOrFail();
        $day->delete();

        return redirect()->route('gunler.index', $shift->id)->with(['success' => 'Gün başarıyla silindi.']);
    }
}
