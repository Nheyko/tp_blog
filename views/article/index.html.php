<!-- Afficher la donnée récupérer de la bdd -->
<?php

// les instructions qui afficheront les données récupérées dans la bdd
require TEMPLATES . DIRECTORY_SEPARATOR . 'header.html.php';

if(isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
    echo $_SESSION['successMsg'];
    $_SESSION['successMsg'] = "";
}

?>

<h1>Liste des articles</h1>
<?php
foreach ($articles as $article):
?>

<article>
    <h2><?= $article->getTitle() ?></h2>
    <span><?= $article->getCreatedAt() ?></span>
    <p><?= nl2br($article->getContent()) ?></p>
    <a href="<?= sprintf('/article/%d/show', $article->getId()) ?>">Voir l'article</a>
    <br>
    <a href="<?= sprintf('/article/%d/edit', $article->getId()) ?>">Editer l'article</a>
    <br>
    <a href="<?= sprintf('/article/%d/delete', $article->getId()) ?>">Supprimer l'article</a>
</article>

<?php endforeach; ?>

<br>
<a href="<?= '/article/new' ?>">Ajouter article</a>

<?php

require TEMPLATES . DIRECTORY_SEPARATOR . 'footer.html.php';