<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    use HasFactory;
    protected $table="pokemons";
    protected $primaryKey="num_ID";
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
    public function property()
    {
        return $this->belongsTo('App\Models\property', 'pr_ID', 'num');
    }
    public function scopeGroup($pokemon)
    {
        $pokemon->join('properties' , 'pokemons.pr_ID' , '=' , 'properties.num')
            ->where('group','=','關都')
            ->orderby('pokemons.num_ID')
            ->select(
                'pokemons.num_ID',
                'pokemons.name',
                'properties.property as property',
                'pokemons.height',
                'pokemons.weight',
                'pokemons.growing',
                'pokemons.group',
                'pokemons.place',
            );
    }
    public function scopePosition($query,$PM)
    {
        $query->where('pokemons.group','=',$PM)
            ->orderby('pokemons.num_ID');
    }


    public function scopePositions($query)
    {
        $query->select('group')->groupBY('group');
    }
}
