<?php
$title = 'List of Posts';
ob_start();
?>

<h1>List of Posts</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li><a href="/post_controller.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
include 'layout.php';
