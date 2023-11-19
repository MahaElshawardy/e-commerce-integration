<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    public function variations()
    {
        return $this->hasMany(Variation::class, 'product_id', 'id');
    }
    public function product_colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
}
