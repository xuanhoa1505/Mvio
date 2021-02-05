<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loainho extends Model
{
    use HasFactory;
    protected $table = 'loainho';
    public $timestamps=false;

    // ngược lại từ loại nhỏ -> loai
    public function loai() {
        return $this ->belongsTo('App\Models\loai', 'loai_id', 'id'); 
    }
}
