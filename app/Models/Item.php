<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'Item';
    public $timestamps=false;

    // loai -> lOAI NHO
    public function itemtype() {
        return $this ->hasMany('App\Models\Item_type', 'Item_id', 'id');  
    }

    // ngược lại từ loại-> đối tượng
    public function customers() {
        return $this ->belongsTo('App\Models\Item', 'Cust_id', 'id'); 
    }

   
}

