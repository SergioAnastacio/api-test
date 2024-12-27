<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImages extends Model
{
    //* Important define soft delete
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'original_url',
        'url',
        'product_id',
    ];

    //* relationship with product model
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
