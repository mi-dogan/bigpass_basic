<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany('App\Models\District', 'city_id', 'city_id');
    }

    public function birthdistricts()
    {
        return $this->hasMany('App\Models\District', 'city_id', 'birth_city_id');
    }
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
