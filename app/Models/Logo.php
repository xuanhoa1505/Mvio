<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $table = 'Logo';   
    public $timestamps= false;

    // bảng cao nhất doi tuong -> loai (hasMany: có nheieuf)
   
}
