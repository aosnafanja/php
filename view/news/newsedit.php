<html>
<head>
    <meta charset="utf-8">
    <title><? echo $item->title; ?></title>
</head>
<body>
<p><a href="index.php"> Main Page</a> | <a href="/index.php?ctrl=Admin&act=Form">Add News</a>
    | <a href="/index.php?ctrl=Admin&act=FindByColumn">Search by Title</a> |
    <a href="/index.php?ctrl=Admin&act=All">Admin center</a>
</p>

<form action="/index.php?ctrl=Admin&act=Edit" method="post">
    <label for="title">Название новости:</label> <br/>
    <input type="text" name="title" id="title" value="<? echo $item->title; ?>"/>
    <br/> <br/>
    <label for="text">Текст новости: <br/></label>
    <textarea name="text" id="text"><? echo $item->text; ?></textarea>
    <br/>
    <input type="hidden" name="id" value="<? echo $item->id; ?>">
    <input type="submit" value="Edit">
</form>
</body>
</html>