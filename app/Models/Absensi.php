<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory, UsesUUID;

    protected $table = 'absensi';
    protected $fillable = ['nama','tanggal','checkin','checkout','total','gaji'];
}
