<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Item;
class Customers extends Model
{
    use HasFactory;
    protected $table = 'Customers';   
    public $timestamps= false;

    // bảng cao nhất doi tuong -> loai (hasMany: có nheieuf)
    public function item() {
        // model - khóa ngoại - khóa chính
        return $this->hasMany('App\Models\Item', 'Cust_id', 'id');
    }

}
