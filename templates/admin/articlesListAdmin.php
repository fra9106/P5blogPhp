<?php $this->title = "Liste des articles Admin"; ?>
<div class="articlewrite">
    <h3><a href="index.php?route=administration">Accueil Admin</a></h3>
    <h3><a href="index.php?route=addArticle">Rédiger un article</a></h3>
    <h3><a href="index.php?route=commentsListAdmin">Gestion des commentaires</a></h3>
    <h3><a href="index.php?route=messagesListAdmin">Gestion des messages</a></h3>
    <h3><a href="index.php?route=usersListAdmin">Gestion des membres</a></h3>
    <br>
    <div class="container mt-4">
        <h1>Articles :</h1><br>
        <h4 class="red"><?= $this->session->show('articlesListAdmin'); ?></h4>
        <h4 class="red"><?= $this->session->show('delete_articleAdmin'); ?></h4>
        <h4 class="red"><?= $this->session->show('add_article'); ?></h4>
        <br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>CONTENU</th>
                    <th>DATE CREATION</th>
                    <th>DATE MODIFICATION</th>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($articles as $article)
            {
            ?>
            <tr>
                
                <td><?= htmlspecialchars($article->getTitle());?></td>
                <td><?= $article->getContent();?></td>
                <td><?= htmlspecialchars($article->getCreationDate());?></td>
                <td><?= htmlspecialchars($article->getUpdateDate());?></td>
                <td>
                    <a href="index.php?route=editArticleAdmin&articleId=<?= $article->getId(); ?>"><button type="button" class="btn btn-sm btn-outline-success">Modifier</button></a>
                </td>
                
                <td>
                    <a href="index.php?route=confirmDeleteArticle&articleId=<?= $article->getId(); ?>"><button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        </div>
    </div><br><br>
</div>
