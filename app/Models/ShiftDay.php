<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftDay extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function shift()
    {
        return $this->hasOne('App\Models\Shift', 'id', 'shift_id');
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
