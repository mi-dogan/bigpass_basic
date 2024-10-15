<?php

namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AccessControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:control';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('ssa');
        $emplooyes = Employee::query()->get();
        $currentDateTime = Carbon::now();

        foreach ($emplooyes as $emplooye) {
            $targetTime = Carbon::parse($emplooye->real_shift->morning_exit);

            if (!$targetTime->greaterThan($currentDateTime)) {
                $activity = Activity::where(["employee_id" => $emplooye->id, "shift_day_id" => $emplooye->real_shift->id])->first();

                if (!$activity) {
                    if (!$emplooye->consent) {
                        Activity::query()->create([
                            'employee_id' => $emplooye->id,
                            'shift_day_id' => $emplooye->real_shift->id,
                            'status' => 1
                        ]);
                    } else {
                        Activity::query()->create([
                            'employee_id' => $emplooye->id,
                            'shift_day_id' => $emplooye->real_shift->id,
                            'status' => 2
                        ]);
                    }
                }
            }
        }
    }
}
