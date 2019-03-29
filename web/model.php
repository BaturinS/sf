<?php

function open_database_connection()
{
    $dbconn = pg_connect("host=db-dev.mobio.ru port=5432 dbname=dev_baturin_sf user=developer password=RuYPamZOPZ")
    or die("Невозможно подключиться к БД");

    return $dbconn;
}

function close_database_connection($dbconn)
{
    pg_close($dbconn);
}

function get_all_posts()
{
    $dbconn = open_database_connection();
    $result = pg_query($dbconn, 'SELECT id, title FROM post ORDER BY id');

    $posts = [];
    while ($row = pg_fetch_assoc($result)) {
        $posts[] = $row;
    }
    unset($result);
    close_database_connection($dbconn);

    return $posts;
}

function getPostById($id)
{
    $dbconn = open_database_connection();
    $result = pg_query($dbconn, "SELECT title, text, date FROM post WHERE id = $id");

    $post = pg_fetch_assoc($result);

    close_database_connection($dbconn);

    return $post;
}
