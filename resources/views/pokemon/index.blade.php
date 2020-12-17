@extends('app')

@section('title' ,'寶可夢列表')

@section('header','寶可夢列表')

@section('href')
    <a href="<?php echo route('pokemon.index');?>">回到寶可夢列表</a>
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a><br/>
    <a href="<?php echo route('pokemon.Group');?>">關都地區寶可夢</a>



    <form action="{{route('pokemon.Positions')}}" method="post">
        {!! Form::label('PM','選取地區：') !!}
        {!! Form::select('PM',$positions,['class'=>'form-control']) !!}
        <input class="btn btn-default" type="submit" value="查詢">
        @csrf
    </form>

@endsection

@section('pokemon_contents')
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>神奇寶貝</th>
        <th>派系</th>
        <th>身高(m)</th>
        <th>體重(kg)</th>
        <th>進化可能</th>
        <th>地區</th>
        <th>出現場所</th>
        <th>檢視</th>
        <th>編輯</th>
        <th>刪除</th>

    </tr>
    @foreach($pokemons as $pokemon)
        <tr>
            <td align="center" valign="center">{{$pokemon->num_ID}}</td>
            <td align="center" valign="center">{{$pokemon->name}}</td>
            <td align="center" valign="center">{{$pokemon->property}}</td>
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

            <td align="center" valign="center"> <a href="{{route('pokemon.show',['id'=> $pokemon->num_ID])}}">檢視</a></td>
            <td align="center" valign="center"> <a href="{{ route('pokemon.edit',['id'=> $pokemon->num_ID])}}">編輯</a></td>
            <td align="center" valign="center">
            <form action="{{ url('/pokemons/delete',['id'=>$pokemon->num_ID])}}" method="post">
                <input class="btn btn-default" type="submit" value="刪除"/>
                @method('delete')
                @csrf

            </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
