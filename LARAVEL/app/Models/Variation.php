<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
