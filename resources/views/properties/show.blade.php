
@extends('app')

@section('title' ,'顯示單筆')

@section('header','顯示一筆屬性')

@section('href')
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a>
@endsection

@section('pokemon_contents')
    <div align="center">
        派系編號：{{$property->num}}<br>
        派系：{{$property->property}}<br>
        特性：{{$property->characteristic}}<br>
        主場：{{$property->home}}<br>
        弱點屬性：{{$property->weakness}}<br>
    </div>
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>神奇寶貝</th>
        <th>身高(m)</th>
        <th>體重(kg)</th>
        <th>進化可能</th>
        <th>地區</th>
        <th>出現場所</th>


    </tr>
    @foreach($pokemons as $pokemon)
        <tr>
            <td align="center" valign="center">{{$pokemon->num_ID}}</td>
            <td align="center" valign="center">{{$pokemon->name}}</td>

            <td align="center" valign="center">{{$pokemon->height}}</td>
            <td align="center" valign="center">{{$pokemon->weight}}</td>
            <td align="center" valign="center">
                @if ($pokemon->growing=='是')
                    <p style="color: blue;">
                @else
                    <p style="color: red;">
                        @endif
                        {{$pokemon->growing}}</p></td>

            <td align="center" valign="center">{{$pokemon->group}}</td>
            <td align="center" valign="center">{{$pokemon->place}}</td>
        </tr>
    @endforeach
</table>

@endsection
