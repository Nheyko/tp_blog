<?php
require TEMPLATES . DIRECTORY_SEPARATOR . 'header.html.php';
?>

<h1>Article</h1>

<article>
    <h2><?= $article->getTitle() ?></h2>
    <span><?= $article->getCreatedAt() ?></span>
    <p><?= nl2br($article->getContent()) ?></p>
</article>

<?php
require TEMPLATES . DIRECTORY_SEPARATOR . 'footer.html.php';
?>