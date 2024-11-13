<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\ShiftStoreRequest;
use App\Http\Requests\Back\ShiftUpdateRequest;
use App\Models\Companys;
use App\Models\Employee;
use App\Models\Shift;
use App\Models\ShiftDay;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::byCompany()->with('days', function ($query) {
            $query->orderBy('type', 'asc');
        })->withCount('employee')->orderBy('id', 'desc')->get();
        $employees = Employee::all();
        $modals = ['create' => ['name'], 'edit' => ['name']];
        return view('back.pages.shift.index', compact('employees', 'modals', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftStoreRequest $request)
    {
        $shift = Shift::query()->create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
        ]);

        foreach ($request->type as $type) {
            ShiftDay::query()->create([
                'company_id' => auth()->user()->company_id,
                'type' => $type,
                'morning_entrance' => $request->morning_entrance,
                'morning_exit' => $request->morning_exit,
                'noon_entrance' => $request->noon_entrance,
                'noon_exit' => $request->noon_entrance,
                'option' => $request->option,
                'shift_id' => $shift->id
            ]);
        }

        return redirect()->route('vardiyalar.index')->with(['success' => 'Vardiya başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $companyId = auth()->user()->company_id;
        if ($companyId == 0) {
            $shift = Shift::query()->where('id', $id)->first();
            return response()->json([
                'shift' => $shift
            ], 200);
        }
        $shiftCount = Shift::where('company_id', $companyId)->count();
        $currentCompany = Companys::query()->where('id', $companyId)->first();
        $shiftLimit = $currentCompany->shift_limit;
        if ($shiftLimit == 0) {
            $shift = Shift::query()->where('id', $id)->first();
            return response()->json([
                'shift' => $shift
            ], 200);
        } else if ($shiftCount >= $shiftLimit) {
            if ($request->method == 'edit') {
                $shift = Shift::query()->where('id', $id)->first();
                return response()->json([
                    'shift' => $shift
                ], 200);
            } else {
                return response()->json(['limitReached' => true], 200);
            }
        } else {
            $shift = Shift::query()->where('id', $id)->first();
            return response()->json([
                'shift' => $shift
            ], 200);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftUpdateRequest $request, string $id)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();

        $shift->update([
            'name' => $request->update_name,
            'status' => $request->status
        ]);

        return redirect()->route('vardiyalar.index')->with(['success' => 'Vardiya başarıyla güncellendi.']);
    }

    public function employee(Request $request, string $id)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();

        if ($request->employee) {
            Employee::query()->whereIn('id', $request->employee)->update(['shift_id' => $shift->id]);
            Employee::query()->whereNotIn('id', $request->employee)->where('shift_id', $shift->id)->update(['shift_id' => null]);
        } else {
            Employee::query()->where('shift_id', $shift->id)->update(['shift_id' => null]);
        }


        return redirect()->back()->with(['success' => 'Vardiya başarıyla güncellendi.']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = Shift::query()->where('id', $id)->firstOrFail();
        $shift->delete();
        return redirect()->route('vardiyalar.index')->with(['success' => 'Vardiya başarıyla silindi.']);
    }
}
