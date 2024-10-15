<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
    protected $appends = ['total_working_hours', 'last_external'];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function dates($date)
    {
        return Carbon::parse($date)->setTimezone('Europe/Istanbul') ?? null;
    }

    public function shiftDay()
    {
        return $this->hasOne('App\Models\ShiftDay', 'id', 'shift_day_id');
    }

    public function external()
    {
        return $this->hasMany('App\Models\ExternalActivity', 'activity_id', 'id');
    }

    public function getLastExternalAttribute()
    {
        return $this->external()->latest()->first();
    }
    public function getTotalWorkingHoursAttribute()
    {
        $morningEntrance = Carbon::parse($this->morning_entrance);
        $morningExit = Carbon::parse($this->morning_exit);
        $noonExit = Carbon::parse($this->noon_exit);
        $noonEntrance = Carbon::parse($this->noon_entrance);
        // Sabah girişi ve çıkışı arasındaki saat toplamı hesaplanıyor
        $morningTotalHours = $morningExit->diffInSeconds($morningEntrance);
        // Öğle arasındaki giriş ve çıkış arasındaki saat toplamı hesaplanıyor
        $lunchBreakHours = $noonExit->diffInSeconds($noonEntrance);
        // Toplam çalışma süresi hesaplanıyor (sabah toplamı - öğle arası)
        $totalHours = $morningTotalHours - $lunchBreakHours;

        return gmdate("H:i:s", $totalHours);
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
