
<html >
<title>
    修改這筆神奇寶貝
</title>
<body class="antialiased">
<h1 align="center">修改這筆神奇寶貝</h1>
<p align="center">
    <a href="<?php echo route('pokemon.index');?>">回到神奇寶貝列表</a></p>
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
    </tr>
    <tr>
        <td align="center" valign="center">{{$num_ID}}</td><br/>
        <td align="center" valign="center">{{$name}}</td><br/>
        <td align="center" valign="center">{{$pr_ID}}</td><br/>
        <td align="center" valign="center">{{$height}}</td><br/>
        <td align="center" valign="center">{{$weight}}</td><br/>
        <td align="center" valign="center">{{$growing}}</td><br/>
        <td align="center" valign="center">{{$group}}</td><br/>
        <td align="center" valign="center">{{$place}}</td><br/>
    </tr>
</table>
</body>
</html>
