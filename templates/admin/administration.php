<?php $this->title = 'Administration'; ?>

<div class="articlewrite">
    <h2>Bonjour administrateur <?= $this->session->get('pseudo'); ?></h2><br><br>
    <h3>
        Espace Administration
    </h3><br><br>
    <h3><a href="index.php?route=addArticle">Rédiger un article</a></h3>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?route=commentsListAdmin">Gestion des commentaires</a></h3>
    <h3><a href="index.php?route=messagesListAdmin">Gestion des messages</a></h3>
    <h3><a href="index.php?route=usersListAdmin">Gestion des membres</a></h3>
</div>
    