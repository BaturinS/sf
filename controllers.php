<?php

use Symfony\Component\HttpFoundation\Response;

function list_action()
{
    $posts = get_all_posts();
    $html = render_template('templates/list_of_posts.php', array('posts' => $posts));

    return new Response($html);
}

function show_action($id)
{
    $post = getPostById($id);
    $html = render_template('templates/post.php', array('post' => $post));

    return new Response($html);
}

// Функция-помощник для отображения шаблонов
function render_template($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    $html = ob_get_clean();

    return $html;
}
