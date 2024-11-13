<?php

namespace App\Http\Controllers;

use App\Http\Resources\PdksActivityResource;
use App\Models\Department;
use App\Models\Device;
use App\Models\Employee;
use App\Models\EmployeeCard;
use App\Models\pdks_entrances;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdksController extends Controller
{
    public function index(Request $request)
    {
        $activities = pdks_entrances::byCompany()
            ->with('employee')
            // ->where(function ($query) use ($request) {
            //     if (!empty(request('start_date')) && !empty(request('end_date'))) {
            //         $startDate = new Carbon(request('start_date'));
            //         $endDate = new Carbon(request('end_date'));
            //         $query->whereDate('created_at', '>=', $startDate)
            //             ->whereDate('created_at', '<=', $endDate);
            //     } else {
            //         $query->whereDate('created_at', Carbon::today());
            //     }
            // })
            ->whereHas('employee', function ($query) {
                $query->department()->when(request('department_id'), function ($query, $department_id) {
                    $query->where('department_id', $department_id);
                })->when(request('position_id'), function ($query, $position_id) {
                    $query->where('position_id', $position_id);
                });
            })
            ->when(request('employee_id'), function ($query, $employee_id) {
                $query->where('employee_id', $employee_id);
            })
            ->orderBy('created_at', 'asc')
            ->get()
            ->reverse();

        $departments = Department::query()->get();
        $positions = Position::query()->get();
        $employees = Employee::query()->department()->get();

        return view('back.pages.checkpointsActivity.index', compact('activities', 'departments', 'positions', 'employees'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = pdks_entrances::query()->with(['employee', 'external'])->where('id', $id)->first();
        return response()->json([
            'activity' => new PdksActivityResource($activity)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = pdks_entrances::query()->where('id', $id)->firstOrFail();
        $activity->update([
            'morning_entrance' => $request->update_morning_entrance,
            'morning_exit' => $request->update_morning_exit,
            'noon_entrance' => $request->update_noon_entrance,
            'noon_exit' => $request->update_noon_exit
        ]);

        return redirect()->back()->with(['success' => 'Aktivite başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
