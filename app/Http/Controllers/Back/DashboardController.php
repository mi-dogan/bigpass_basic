<?php

namespace App\Http\Controllers\Back;

use App\Models\Consent;
use App\Models\Holiday;
use App\Models\Activity;
use App\Models\EmployeeCard;
use App\Http\Controllers\Controller;
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
        $activities = Activity::byCompany()->whereDate('created_at', Carbon::today())->with('employee')->whereHas('employee', function ($query) {
            $query->department();
        })->get();

        return view('back.pages.dashboard', compact('holidays', 'activities', 'birthdates', 'consents'));
    }
}
