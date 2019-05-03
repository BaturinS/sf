<?php
$title = $post['title'];
ob_start();
?>

<h1><?=$title?></h1>
<div class="date"><?=$post['created_at']?></div>
<div class="text"><?=$post['text']?></div>
<div class="back"><a href="javascript:history.back();">Назад</a></div>

<?php
$content = ob_get_clean();
include 'layout.php';
