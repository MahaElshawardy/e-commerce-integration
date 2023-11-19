<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'image_id',
        'size_id',
        'color_id',
        'price',
        'quantity',
        'created_by',
    ];

    public function images()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
    public function sizes()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
    public function product_color()
    {
        return $this->hasOne(ProductColor::class, 'id', 'color_id');
    }
}
