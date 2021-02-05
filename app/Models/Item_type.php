<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_type extends Model
{
    use HasFactory;
    protected $table = 'Item_type';
    public $timestamps=false;

    // ngược lại từ loại nhỏ -> loai
    public function item() {
        return $this ->belongsTo('App\Models\Item', 'Item_id', 'id'); 
    }
}