<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table='client';
    protected $fillable=[
        'child_first_name' ,
        'child_middle_name' ,
        'child_last_name' ,
        'child_age' ,
        'gender' ,
        'different_address' ,
        'child_address' ,
        'child_city' ,
        'child_state' ,
        'country' ,
        'child_zip_code'
    ];
}
