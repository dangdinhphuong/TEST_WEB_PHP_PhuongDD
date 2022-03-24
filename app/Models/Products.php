<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
class Products extends Model
{
    use HasFactory;
         protected $table = 'products';
        protected $fillable = [
            'name',
            'category_id',
            'price',
            'amount',
            'image',
            'status'
        ];
        public function category()
        {
            return $this->belongsTo(Categories::class);
        }
}
