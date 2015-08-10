<html>
<head>
    <title>Add new News</title>
</head>
<body>
<p><a href="../index.php">Main page</a></p>
<form action="/index.php?ctrl=Admin&act=AddNews" method="post">
    <label for="title">Название новости:</label> <br />
    <input type="text" name="title" id="title" />
    <br />   <br />
    <label for="text">Текст новости: <br /></label>
    <textarea name="text" id="text"></textarea>
    <br />
    <input type="submit" value="add">
</form>
</body>
</html>