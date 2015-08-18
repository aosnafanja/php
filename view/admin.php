<html>
<head>
    <meta charset="utf-8">
    <title>Admin center</title>
</head>

<body>
<p><a href="index.php"> Main Page</a> | <a href="/index.php?ctrl=Admin&act=Form">Add News</a>
    | <a href="/index.php?ctrl=Admin&act=FindByColumn">Search by Title</a></p>

<p>

<h3>All added news:</h3>
<? foreach ($items as $news):
    echo "<a href=\"/index.php?ctrl=Admin&act=Edit&id=" . $news->id . "\" <h4>" . $news->title . "</h4></a>
          <a href=\"/index.php?ctrl=Admin&act=Delete&id=" . $news->id . "\"><input type=\"button\" value=\"Delete\"></a>
          <br /><br />";
endforeach; ?>
</p>
</body>
</html>