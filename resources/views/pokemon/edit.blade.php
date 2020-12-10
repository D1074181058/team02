@extends('app')

@section('title' ,'編輯')

@section('header','編輯一筆寶可夢')

@section('href')
    <a href="<?php echo route('pokemon.index');?>">回到寶可夢列表</a>
@endsection

@section('pokemon_contents')s
    <p align="center"  valign="center" >編號：{!! $pokemon->num_ID !!} </p><br/>
    {!! Form::model($pokemon,['method'=>'PATCH','action'=>['\App\Http\Controllers\PokemonsController@update',$pokemon->num_ID]]) !!}
    @include('pokemon.form',['submitButtonText'=>"編輯寶可夢"])
    {!! Form::close() !!}
@endsection
