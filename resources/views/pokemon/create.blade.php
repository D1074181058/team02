@extends('app')

@section('title' ,'新建')

@section('header','新建一筆寶可夢')

@section('href')
    <a href="<?php echo route('pokemon.index');?>">回到寶可夢列表</a>
@endsection

@section('pokemon_contents')
    @include('message.errors')
    {!! Form::open(['url' => 'pokemons/store']) !!}
    @include('pokemon.form',['submitButtonText'=>"新建寶可夢"])
    {!! Form::close() !!}
@endsection
