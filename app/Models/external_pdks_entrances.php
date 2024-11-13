<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class external_pdks_entrances extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeExceptLatest($query)
    {
        $latestRecord = $this->latest()->first();
        return $query->where('id', '!=', $latestRecord?->id);
    }
}
