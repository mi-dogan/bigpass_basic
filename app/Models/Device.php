<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
