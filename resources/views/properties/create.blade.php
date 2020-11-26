
@extends('app')

@section('title' ,'新建')

@section('header','新建一筆屬性')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
    {!! Form::open(['url' => 'properties/store']) !!}
    <div align="center"  valign="center"  class="form-group">
        {!! Form::Label('property','派系') !!}
        {!! Form::text('property',null,['class'=>'form-control']) !!}
    </div>

    <div  align="center"  valign="center" class="form-group">
        {!! Form::Label('characteristic','特性') !!}
        {!! Form::text('characteristic',null,['class'=>'form-control']) !!}
    </div>

    <div align="center"   valign="center" class="form-group">
        {!! Form::Label('home','主場') !!}
        {!! Form::text('home',null,['class'=>'form-control']) !!}
    </div>

    <div align="center"  valign="center" class="form-group">
        {!! Form::Label('weakness','弱點屬性') !!}
        {!! Form::text('weakness',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection


