<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'branch_id', 'id');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department', 'branch_id', 'id');
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}

