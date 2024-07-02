<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
       return $this->belongsTo(Category::class,'id_category');
    }
    public function variation(){
     return $this->hasMany(Variation::class,'id_product');
    }
    public function color(){
        return $this->belongsTo(Variation::class,'id_color');
    }
}
