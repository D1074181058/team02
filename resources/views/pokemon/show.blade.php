
<html >

<body >
<h1>顯示一筆神奇寶貝</h1>

<a href="<?php echo route('pokemon.index');?>">回到神奇寶貝列表</a>
編號：{{$num_ID}}<br/>
神奇寶貝：{{$name}}<br/>
派系編號：{{$pr_ID}}<br/>
身高：{{$height}}m<br/>
體重：{{$weight}}kg<br/>
進化可能：{{$growing}}<br/>
地區：{{$group}}<br/>
出現場所：{{$place}}<br/>
</body>
</html>
