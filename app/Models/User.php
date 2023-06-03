<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'role_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->role_id = $model->getRoleUser();
        });
    }

    public function getRoleUser()
    {
        $role = Roles::where('name', 'KT')->first();

        return $role->id;
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
