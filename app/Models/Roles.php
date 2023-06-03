<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory, UsesUUID;

    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
