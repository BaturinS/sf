<?php

function open_database_connection()
{
    $dbconn = mysqli_connect('localhost', 'admin', 'Mobio.');
    mysqli_select_db($dbconn, 'sf');

    return $dbconn;
}

function close_database_connection($dbconn)
{
    mysqli_close($dbconn);
}

function get_all_posts()
{
    $dbconn = open_database_connection();
    $result = mysqli_query($dbconn, 'SELECT id, title FROM post ORDER BY id');

    $posts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    unset($result);
    close_database_connection($dbconn);

    return $posts;
}

function getPostById($id)
{
    $dbconn = open_database_connection();
    $result = mysqli_query($dbconn, "SELECT title, text, created_at FROM post WHERE id = $id");

    $post = mysqli_fetch_assoc($result);

    close_database_connection($dbconn);

    return $post;
}
