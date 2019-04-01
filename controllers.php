<?php

function list_action()
{
    $posts = get_all_posts();
    require 'templates/list_of_posts.php';
}

function show_action($id)
{
    $post = getPostById($id);
    require 'templates/post.php';
}
