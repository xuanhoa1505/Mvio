<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgs extends Model
{
    use HasFactory;
   
        protected $table='Imgs';  
        protected $primaryKey = 'id'; 
        protected $data=['id_pro','id','img','stt'];  
        protected $guarded = []; 
   
    
}
