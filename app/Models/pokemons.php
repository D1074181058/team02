<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokemons extends Model
{
    use HasFactory;
    protected $table="pokemons";
    protected $primaryKey="num";
    protected $fillable=[

        'name',
        'pr_ID',
        'height',
        'weight',
        'growing',
        'group',
        'place',
        'created_at' ,
        'updated_at',
        'carbon'
    ];
}
