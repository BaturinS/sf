<?php

$dbconn = pg_connect("host=db-dev.mobio.ru port=5432 dbname=dev_baturin_sf user=developer password=RuYPamZOPZ")
    or die("Невозможно подключиться к БД");
echo "Успешно подключено к БД";

$result = pg_query($dbconn, 'SELECT id, title FROM post');
?>

<html>
<head>
    <title>List of Posts</title>
</head>
<body>
<h1>List of Posts</h1>
<ul>
    <?php while ($row = pg_fetch_assoc($result)): ?>
        <li>
            <a href="/show.php?id=<?php echo $row['id'] ?> ">
                <?php echo $row['title'] ?>
            </a>
        </li>
    <?php endwhile; ?>
</ul>
</body>
</html>

<?php
pg_close($dbconn);
