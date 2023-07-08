<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'table_order';

    protected $fillable = ['order_details','order_date','order_quantity','total_amount','product_id'];

      // Define relationships
      public function order()
      {
          return $this->belongsTo(Product::class);
      }
}
//composer require laravel/passport --with-all-dependencies 
