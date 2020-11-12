
<html >
<title>
    顯示一筆屬性
</title>
<body >
<h1 border="1" align="center">顯示一筆屬性</h1>
<p align="center">
    <a href="<?php echo route('properties.index');?>" border="1" align="center">回到屬性列表</a></p>
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

</body>
</html>
