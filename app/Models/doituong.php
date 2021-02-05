<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\loai;

class doituong extends Model
{
    use HasFactory;
    protected $table = 'doituong';   
    public $timestamps= false;

    // bảng cao nhất doi tuong -> loai (hasMany: có nheieuf)
    public function loai() {
        // model - khóa ngoại - khóa chính
        return $this->hasMany('App\Models\loai', 'doi_tuong_id', 'id');
    }

    public function td()
    {
        return $this ->belongsToMany('App\Models\loai','loaitrung','id_dt','id_l') ;   
    }
    public function tdn()
    {
        return $this ->belongsToMany('App\Models\loainho','loaitrung','id_dt','id_ln') ;   
    }
    
}
