<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    use HasFactory;
    protected $table = 'loai';
    public $timestamps=false;

    // loai -> lOAI NHO
    public function loaiNho() {
        return $this ->hasMany('App\Models\loainho', 'loai_id', 'id');  
    }

    // ngược lại từ loại-> đối tượng
    public function doiTuong() {
        return $this ->belongsTo('App\Models\loai', 'doi_tuong_id', 'id'); 
    }

    public function tdn()
    {
        return $this ->belongsToMany('App\Models\loainho','loaitrung','id_l','id_ln') ;   
    }
}
