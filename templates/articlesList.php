<?php $this->title = "Liste des articles"; ?>
<br><br><br><br>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?= $this->session->show('add_article'); ?>
    <a href="index.php?route=addArticle">Nouvel article</a>
    <?php
    
    foreach($articles as $article)
    {//var_dump($article);
        ?>
        <div>
            <h2><a href="index.php?route=article&articleId=<?= $article->getId();?>"><?= $article->GetTitle();?></a></h2>
            <p><?= $article->getMiniContent(); ?></p>
            <p><?= $article->getContent();?></p>
            <p><?= $article->getPseudo();?></p>
            <p>Créé le : <?= $article->getCreationDate();?></p>
            <p>Modifié le : <?= $article->getUpdateDate();?></p>
        </div>
        <br>
        <?php
    }
    
    ?>
