
@extends('app')

@section('title' ,'新建')

@section('header','新建一筆屬性')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
    {!! Form::open(['url' => 'properties/store']) !!}
    @include('properties.form',['submitButtonText'=>"新建屬性"])
    {!! Form::close() !!}
@endsection


