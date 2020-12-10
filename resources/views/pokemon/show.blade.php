@extends('app')

@section('title' ,'顯示')

@section('header','顯示一筆寶可夢')

@section('href')
    <a href="<?php echo route('pokemon.index');?>">回到寶可夢列表</a>
@endsection

@section('pokemon_contents')
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>神奇寶貝</th>
        <th>派系</th>
        <th>身高(m)</th>
        <th>體重(kg)</th>
        <th>進化可能</th>
        <th>地區</th>
        <th>出現場所</th>
    </tr>
    <tr>
        <td align="center" valign="center">{{$pokemons->num_ID}}</td><br/>
        <td align="center" valign="center">{{$pokemons->name}}</td><br/>
        <td align="center" valign="center">{{$property_name}}</td><br/>
        <td align="center" valign="center">{{$pokemons->height}}</td><br/>
        <td align="center" valign="center">{{$pokemons->weight}}</td><br/>
        <td align="center" valign="center">{{$pokemons->growing}}</td><br/>
        <td align="center" valign="center">{{$pokemons->group}}</td><br/>
        <td align="center" valign="center">{{$pokemons->place}}</td><br/>
    </tr>
</table>
@endsection
