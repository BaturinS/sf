<?php
$dbconn = pg_connect("host=db-dev.mobio.ru port=5432 dbname=dev_baturin_sf user=developer password=RuYPamZOPZ")
or die("Невозможно подключиться к БД");

$result = pg_query($dbconn, 'SELECT id, title FROM post');

$posts = [];
while ($row = pg_fetch_assoc($result)) {
    $posts[] = $row;
}
pg_close($dbconn);

unset($result);

// include the HTML presentation code
require '../templates/list.php';
