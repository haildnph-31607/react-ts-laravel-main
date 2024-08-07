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
    public function variant(){
        return $this->hasMany(Variant::class,'id_product');
    }
    public function sale(){
        return $this->belongsTo(Sale::class,'id_sales');
    }
    public function thumbnail(){
        return $this->hasMany(Thumbnail::class,'id_product');
    }
}
