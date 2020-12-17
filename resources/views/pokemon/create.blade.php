@extends('app')

@section('title' ,'新建')

@section('header','新建一筆寶可夢')

@section('href')
    <a href="<?php echo route('pokemon.index');?>">回到寶可夢列表</a>
@endsection

@section('pokemon_contents')
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url' => 'pokemons/store']) !!}
    @include('pokemon.form',['submitButtonText'=>"新建寶可夢"])
    {!! Form::close() !!}
@endsection
