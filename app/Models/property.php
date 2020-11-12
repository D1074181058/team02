<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected $primaryKey="num";

    protected $fillable=[

        'property',
        'characteristic',
        'home',
        'weakness',
        'created_at' ,
        'updated_at',
        'carbon'
    ];
}
