<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'price',
        'price_unit',
        'quantity',
        'quantity_unit',
        'is_daily',
        'is_hidden',
        'has_reminder',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal',
        'quantity' => 'decimal',
        'is_daily' => 'boolean',
        'is_hidden' => 'boolean',
        'has_reminder' => 'boolean',
    ];
}
