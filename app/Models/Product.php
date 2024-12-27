<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //* Important define soft delete
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'price',
        'qty'
    ];


    //* relationship with productImages model
    public function images()
    {
        return $this->hasMany(productImages::class, 'product_id');
    }
}
