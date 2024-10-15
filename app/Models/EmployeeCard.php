<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeCard extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $dates = ['birthdate'];
    protected $casts = ['birthdate' => 'datetime'];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District', 'city_id', 'city_id');
    }

    public function birthdistricts()
    {
        return $this->hasMany('App\Models\District', 'city_id', 'birth_city_id');
    }

    public function scopeBirthDate($query, $year)
    {
        return $query->whereRaw("DATE_FORMAT(birthdate, '%m-%d') >= DATE_FORMAT(NOW(), '%m-%d')")
            ->whereRaw("DATE_FORMAT(birthdate, '%m-%d') <= DATE_FORMAT(?, '%m-%d')", [$year])
            ->orderByRaw("ABS(DATEDIFF(birthdate, NOW()))");
    }

    public function dates($date)
    {
        return Carbon::parse($date)->setTimezone('Europe/Istanbul') ?? null;
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
