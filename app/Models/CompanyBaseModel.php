<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CompanyBaseModel extends Model
{
    protected static function boot()
    {
        parent::boot();

        // company_id'ye göre filtreleme için global bir kapsam uygula
        static::addGlobalScope('company', function (Builder $builder) {
            if (app()->has('currentCompanyId')) {
                $builder->where('company_id', app('currentCompanyId'));
            }
        });
    }
}
