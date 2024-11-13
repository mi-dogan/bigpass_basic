<?php

namespace App\Http\Controllers\Back;

use App\Models\Consent;
use App\Models\Holiday;
use App\Models\Activity;
use App\Models\EmployeeCard;
use App\Http\Controllers\Controller;
use App\Models\pdks_entrances;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $holidays = Holiday::byCompany()->where('day', '>=', now()->format('d-m'))->orderBy('day')->take(4)->get();
        $today = \Carbon\Carbon::today();
        $endOfYear = $today->copy()->endOfYear();
        $birthdates = EmployeeCard::byCompany()->with('employee')->whereHas('employee', function ($query) {
            $query->department();
        })->birthdate($endOfYear)->limit(5)->get();
        $currentDate = date('Y-m-d'); // Şuanki tarih
        $consents = Consent::byCompany()->whereDate('starting_at', '>=', $today)
            ->whereDate('finished_at', '>=', $today)
            ->take(3)->with('employee')->whereHas('employee', function ($query) {
                $query->department();
            })->get();
        $loggedUserActivity = pdks_entrances::query()->where('employee_id', auth()->user()->employee_id)->first();
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

        return view('back.pages.dashboard', compact('holidays', 'activities', 'birthdates', 'consents', 'loggedUserActivity'));
    }
}
