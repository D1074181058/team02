@extends('app')

@section('title' ,'編輯')

@section('header','編輯一筆寶可夢')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到寶可夢列表</a>
@endsection

@section('pokemon_contents')
    <p align="center"  valign="center" >編號：{!! $num_ID !!} </p><br/>
    {!! Form::open(['url' => 'pokemons/update/'.$num_ID,'method' => 'patch']) !!}
    <div align="center"  valign="center"  class="form-group">
        {!! Form::Label('name','名字') !!}
        {!! Form::text('name',$name,['class'=>'form-control']) !!}
    </div>

    <div  align="center"  valign="center" class="form-group">
        {!! Form::Label('pr_ID','派系編號') !!}
        {!! Form::text('pr_ID',$pr_ID,['class'=>'form-control']) !!}
    </div>

    <div align="center"   valign="center" class="form-group">
        {!! Form::Label('height','身高') !!}
        {!! Form::text('height',$height,['class'=>'form-control']) !!}
    </div>

    <div align="center"  valign="center" class="form-group">
        {!! Form::Label('weight','體重') !!}
        {!! Form::text('weight',$weight,['class'=>'form-control']) !!}
    </div>

    <div align="center"   valign="center" class="form-group">
        {!! Form::Label('growing','進化可能') !!}
        {!! Form::text('growing',$growing,['class'=>'form-control']) !!}
    </div>

    <div align="center"  valign="center" class="form-group">
        {!! Form::Label('group','地區') !!}
        {!! Form::text('group',$group,['class'=>'form-control']) !!}
    </div>
    <div align="center"  valign="center" class="form-group">
        {!! Form::Label('place','出現場所') !!}
        {!! Form::text('place',$place,['class'=>'form-control']) !!}
    </div>
    <div align="center"  valign="center" class="form-group">
        {!! Form::submit('修改',['class' =>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
