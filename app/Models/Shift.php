<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Shift extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $casts = [
        'morning_entrance' => 'datetime:H:i:s',
        'moon_entrance' => 'datetime:H:i:s',
        'morning_exit' => 'datetime:H:i:s',
        'moon_exit' => 'datetime:H:i:s',
    ];

    protected $dates = [
        'morning_entrance',
        'moon_entrance',
        'morning_exit',
        'moon_exit'
    ];

    public function days()
    {
        return $this->hasMany('App\Models\ShiftDay', 'shift_id', 'id');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee', 'shift_id', 'id');
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
