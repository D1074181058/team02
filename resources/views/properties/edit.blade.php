
@extends('app')

@section('title' ,'編輯')

@section('header','編輯')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
    <p align="center"  valign="center" >編號：{!! $num_ID !!} </p><br/>
    {!! Form::open(['url' => 'properties/update'.$num, 'method' => 'patch' ]) !!}
    <div align="center"  valign="center"  class="form-group">
        {!! Form::Label('num','編號') !!}
        {!! Form::text('num',$num) !!}
    </div>

    <div align="center"  valign="center"  class="form-group">
        {!! Form::Label('property','派系') !!}
        {!! Form::text('property',$property,['class'=>'form-control']) !!}
    </div>

    <div  align="center"  valign="center" class="form-group">
        {!! Form::Label('characteristic','特性') !!}
        {!! Form::text('characteristic',$characteristic,['class'=>'form-control']) !!}
    </div>

    <div align="center"   valign="center" class="form-group">
        {!! Form::Label('home','主場') !!}
        {!! Form::text('home',$home,['class'=>'form-control']) !!}
    </div>

    <div align="center"  valign="center" class="form-group">
        {!! Form::Label('weakness','弱點屬性') !!}
        {!! Form::text('weakness',$weakness,['class'=>'form-control']) !!}
    </div>
    <div align="center"  valign="center" class="form-group">
        {!! Form::submit('修改',['class' =>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
