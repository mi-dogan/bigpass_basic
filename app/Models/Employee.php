<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $appends = ['real_shift'];

    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }

    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function card()
    {
        return $this->hasOne('App\Models\EmployeeCard', 'employee_id', 'id')->with('districts', 'birthdistricts');
    }

    public function information()
    {
        return $this->hasOne('App\Models\EmployeeInformation', 'employee_id', 'id');
    }

    public function urgent()
    {
        return $this->hasOne('App\Models\EmployeeUrgent', 'employee_id', 'id');
    }

    public function scopeDepartment($query)
    {
        if (Auth::user()->hasRole('admin')) {
            $departmentIds = Auth::user()->load(['departments'])->departments->pluck('department_id');
            return $query->whereIn('department_id', $departmentIds);
        }
        return $query;
    }

    public function consent()
    {
        $today = Carbon::now()->format('Y-m-d');
        return $this->hasOne('App\Models\Consent', 'employee_id', 'id')->where('starting_at', '<=', $today)->where('finished_at', '>=', $today);
    }

    public function getProfileimgAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        $fullname = explode(' ', $this->name);
        $photo_name = '';
        $count = count($fullname);

        if ($count > 1) {
            $photo_name = mb_substr($fullname[0], 0, 1) . mb_substr($fullname[1], 0, 1);
        } else {
            $photo_name = mb_substr($fullname[0], 0, 1);
        }

        return 'https://ui-avatars.com/api/?name=' . $photo_name . '&format=svg';
    }

    public function shift()
    {
        return $this->hasOne('App\Models\Shift', 'id', 'shift_id')->with('days');
    }

    public function shiftgroup()
    {
        return $this->hasOne('App\Models\Shift', 'id', 'shift_group_id')->with('days');
    }

    public function getRealShiftAttribute()
    {
        $now = date('N');
        $today = null;

        if ($this->shift) {
            foreach ($this->shift->days as $day) {
                if ($day->type == $now) {
                    $today = $day;
                }
            }
        } else if ($this->shiftgroup) {
            foreach ($this->shiftgroup->days as $day) {
                if ($day->type == $now) {
                    $today = $day;
                }
            }
        }

        return $today;
    }

    public function getIsConsentAttribute(): bool
    {
        $today = Carbon::now()->format('m-d');
        $holiday = Holiday::query()->whereRaw("DATE_FORMAT(day, '%m-%d') = ?", [$today])->first();

        if ($holiday) {
            return true;
        } else if ($this->consent) {
            return true;
        }
        return false;
    }

    public function smsLog()
    {
        return $this->hasMany(SmsLog::class, "phone");
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->getRememberToken();
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
