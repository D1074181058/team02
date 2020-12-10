
@extends('app')

@section('title' ,'編輯')

@section('header','編輯')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
    <p align="center"  valign="center" >編號：{!! $properties->num !!} </p><br/>
    {!! Form::model($properties,['method'=>'PATCH','action'=>['\App\Http\Controllers\PropertiesController@update',$properties->num]]) !!}
    @include('properties.form',['submitButtonText'=>"編輯屬性"])
    {!! Form::close() !!}
@endsection
