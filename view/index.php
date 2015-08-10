<html>
<head>
    <meta charset="utf-8">
    <title>TFN - Main</title>
</head>

<body>
    <h1>Today Fresh News</h1>
    <a href="/index.php?ctrl=Admin&act=Form"><input type="button" value="Добавить новость"></a>
    <br /> <br />
    <? foreach ($items as $news):
     echo "<a href=\"/index.php?ctrl=News&act=One&id=". $news->id ."\" <h2>". $news->title ."</h2></a><br />";
    endforeach; ?>
</body>
</html>
