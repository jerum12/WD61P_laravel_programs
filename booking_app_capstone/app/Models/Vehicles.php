<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

  

    protected $fillable = [
        'vehicle_name','engine','model','chasis_number','plate_number'
    ];
}
