
@extends('app')

@section('title' ,'編輯')

@section('header','編輯')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>派系</th>
        <th>特性</th>
        <th>主場</th>
        <th>弱點屬性</th>
    </tr>
    <tr>
        <td align="center" valign="center">{{$num}}</td>
        <td align="center" valign="center">{{$property}}</td>
        <td align="center" valign="center">{{$characteristic}}</td>
        <td align="center" valign="center">{{$home}}</td>
        <td align="center" valign="center">{{$weakness}}</td>
    </tr>
</table>
@endsection
