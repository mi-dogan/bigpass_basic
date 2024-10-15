<?php

namespace App\Http\Controllers\Back;

use App\Models\CardError;
use Carbon\Carbon;
use App\Models\Activity;
use App\Models\ExternalActivity;
use App\Models\Employee;
use App\Models\EmployeeCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\ActivityStoreRequest;
use App\Http\Requests\Back\ActivityUpdateRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Department;
use App\Models\Device;
use App\Models\Position;
use Illuminate\Support\Facades\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = Activity::query()
            ->with('employee')
            ->where(function($query)use($request){
                if(!empty(request('start_date'))&&!empty(request('end_date'))){

                    $startDate = new Carbon(request('start_date'));
                    $endDate = new Carbon(request('end_date'));
                    $query->whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate);
                }else{
                    $query->whereDate('created_at', Carbon::today());
                }
            })

            ->whereHas('employee', function ($query) {
                $query->department()->when(request('department_id'), function ($query, $department_id) {
                        $query->where('department_id', $department_id);
                    })->when(request('position_id'), function ($query, $position_id) {
                        $query->where('position_id', $position_id);
                    }); })->when(request('employee_id'), function ($query, $employee_id) {
                    $query->where('employee_id', $employee_id);
                })->orderBy('created_at', 'asc')->get();
            $departments = Department::query()->get();
            $positions = Position::query()->get();
            $employees = Employee::query()->department()->get();
        return view('back.pages.activty.index', compact('activities', 'departments', 'positions', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityStoreRequest $request)
    {
        //Log::info($request);
        if($request->request_type == "qr"){
            $employee = Employee::query()->where('id', $request->employee_id)->first();
        }else{
            if(strlen($request->card_no) < 10){
                $request->card_no = str_pad($request->card_no, 10, "0", STR_PAD_LEFT);
            }
            $employeeCard = EmployeeCard::query()->where('card_no', $request->card_no)->first();
            $employee = Employee::query()->where('id', $employeeCard->employee_id)->first();
        }
        $device = Device::query()->where('device_id',$request->device_id)->first();

        if($request->request_type != "qr"){
            if (!$employeeCard) {
                return response()->json([
                    'status' => false,
                    'message' => 'card_no sistemde kayıtlı değil.'
                ], 403);
            }
        }

        if (!$employee->real_shift) {
            return response()->json([
                'status' => false,
                'message' => 'Kullanıcı herhangi bir vardiyaya atanmamış.'
            ], 403);
        }
        if ($employee->is_consent) {
            return response()->json([
                'status' => false,
                'message' => 'Kullanıcı tatilde veya izinli.'
            ], 403);
        }

        $activity = Activity::query()->where('employee_id', $employee->id)->whereDate('created_at', '=', date('Y-m-d'))->latest()->first();
        $externalActivity = ExternalActivity::query()->where('activity_id', $activity?->id)->whereDate('created_at', '=', date('Y-m-d'))->latest()->first();

        if ($activity) {
           if($activity->status == 0){
               if (!$activity->morning_exit) {
                   $activity->update([
                       'morning_exit' => Carbon::now()->format('H:i:s')
                   ]);
               }else if($activity->morning_exit)
               {
                   if($externalActivity && !$externalActivity->morning_exit)
                   {
                       $externalActivity->update([
                           'morning_exit' =>  Carbon::now()->format('H:i:s')
                       ]);

                       $activity->update([
                           'morning_exit' => Carbon::now()->format('H:i:s')
                       ]);
                   }else{
                       ExternalActivity::query()->create([
                           'morning_entrance' =>  Carbon::now()->format('H:i:s'),
                           'activity_id' => $activity->id
                       ]);
                   }
               }
           }else{
               if($externalActivity && !$externalActivity->morning_exit)
               {
                   $externalActivity->update([
                       'morning_exit' =>  Carbon::now()->format('H:i:s')
                   ]);

//                   $activity->update([
//                       'morning_exit' => Carbon::now()->format('H:i:s')
//                   ]);

               }else{
                   ExternalActivity::query()->create([
                       'morning_entrance' =>  Carbon::now()->format('H:i:s'),
                       'activity_id' => $activity->id
                   ]);
               }
           }
        }else {
            Activity::query()->create([
                'morning_entrance' => Carbon::now()->format('H:i:s'),
                'shift_day_id' => $employee->real_shift->id,
                'employee_id' => $employee->id,
                'device_id' => $device->id
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'İşlem Başarılı.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::query()->with(['employee','external'])->where('id', $id)->first();
        return response()->json([
            'activity' => new ActivityResource($activity)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityUpdateRequest $request, string $id)
    {
        $activity = Activity::query()->where('id', $id)->firstOrFail();
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
