<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'profile_img'
    ];


    public function scopeNotIm($query)
    {
        return $query->where('id', '!=', Auth::user()->id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'superadmin');
            });
    }

    public function scopeBranch($query)
    {
        if (!Auth::user()->hasRole('superadmin')) {
            return $query->where('branch_id', $this->branch_id);
        }
    }

    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\UserDepartment', 'user_id', 'id');
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
    public function scopeByCompany($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
