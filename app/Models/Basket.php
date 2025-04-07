<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function products()
{
    return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
}

protected $fillable = [
    'user_id',
    'product_id',
    'product_name',
    'quantity',
   
];
    
    protected $table = 'basket';

    // Define relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship to the Product model
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}


