
<html>
<head>
    <title>TFN - Main</title>
</head>

<body>
    <h1>Today Fresh News</h1>
    <a href="/index.php?action=addnews"><input type="button" value="Добавить новость"></a>
    <br /> <br />
    <? foreach ($allnews as $news):
     echo "<a href=\"/index.php?action=news&id=". $news['id'] ."\" <h2>". $news['title'] ."</h2></a><br />";
    endforeach; ?>
</body>
</html>
