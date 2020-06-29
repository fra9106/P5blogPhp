<?php

require '../vendor/autoload.php';

use App\src\DAO\ArticleDAO;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
    $articles = new ArticleDAO();
    $article = $articles->getArticles();
    while($articles = $article->fetch())
    {
        ?>
        <div>
            <h2><a href="single.php?articleId=<?= htmlspecialchars($articles->id);?>"><?= htmlspecialchars($articles->title);?></a></h2>
            <p><?= htmlspecialchars($articles->mini_content);?></p>
            <p><?= htmlspecialchars($articles->content);?></p>
            <p><?= htmlspecialchars($articles->pseudo);?></p>
            <p>Créé le : <?= htmlspecialchars($articles->creation_date_fr);?></p>
        </div>
        <br>
        <?php
    }
    $articles->closeCursor();
    ?>
</div>
</body>
</html>