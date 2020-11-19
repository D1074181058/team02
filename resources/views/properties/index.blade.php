
<html >
<title>
    屬性列表
</title>
<body class="antialiased">
<h1 align="center">屬性列表</h1>
<p align="center"><a   href="<?php echo route('pokemon.index');?>"  >回到神奇寶貝列表</a></p>
<table border="1" align="center">
    <tr>
        <th>編號</th>
        <th>派系</th>
        <th>特性</th>
        <th>主場</th>
        <th>弱點屬性</th>
        <th>檢視</th>
        <th>編輯</th>
    </tr>
    @foreach($properties as $property)
        <tr>
            <td align="center" valign="center">{{$property->num}}</td>
            <td align="center" valign="center">{{$property->property}}</td>
            <td align="center" valign="center">{{$property->characteristic}}</td>
            <td align="center" valign="center">{{$property->home}}</td>
            <td align="center" valign="center">{{$property->weakness}}</td>

            <td align="center" valign="center"> <a href="{{ route('properties.show',['id'=> $property->num])}}">檢視</a></td>
            <td align="center" valign="center"> <a href="{{ route('properties.edit',['id'=> $property->num])}}">編輯</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>
