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

    public function pokemons()
    {
        return $this->hasMany('App\Models\pokemon', 'pr_ID');
    }

    Public function delete()
    {
        $this->pokemons()->delete();
        return parent::delete();
    }

    public function scopePosition($query,$PR)
    {
        $query->where('home','=',$PR)
            ->orderby('num')
            ->select(
                'num',
                'property',
                'characteristic',
                'home',
                'weakness'
            );
    }

    public function scopePositions($query)
    {
        $query->select('home')->groupBY('home');
    }
}
