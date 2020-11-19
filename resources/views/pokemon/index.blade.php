
<html >

<body >
<title>
    神奇寶貝列表
</title>
<h1 align="center">神奇寶貝列表</h1>
<p align="center">
    <a href="<?php echo route('properties.index');?>">回到屬性列表</a></p>
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>神奇寶貝</th>
        <th>派系編號</th>
        <th>身高(m)</th>
        <th>體重(kg)</th>
        <th>進化可能</th>
        <th>地區</th>
        <th>出現場所</th>
        <th>檢視</th>
        <th>編輯</th>

    </tr>
    @foreach($pokemons as $pokemon)
        <tr>
            <td align="center" valign="center">{{$pokemon->num_ID}}</td>
            <td align="center" valign="center">{{$pokemon->name}}</td>
            <td align="center" valign="center">{{$pokemon->pr_ID}}</td>
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
        </tr>
    @endforeach
</table>
</body>
</html>
