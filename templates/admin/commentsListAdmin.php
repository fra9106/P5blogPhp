<?php $this->title = "Liste des commentaires Admin"; ?>
<br>
<div class="articlewrite">
    <h3><a href="index.php?route=administration">Accueil Admin</a></h3>
    <h3><a href="index.php?route=addArticle">Rédiger un article</a></h3>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?route=messagesListAdmin">Gestion des messages</a></h3>
    <h3><a href="index.php?route=usersListAdmin">Gestion des membres</a></h3>
    <br>
    <div class="container mt-4">
        <h2>Commentaires :</h2><br><br>
        <h4 class="red"><?= $this->session->show('valid_comment'); ?></h4>
        <h4 class="red"><?= $this->session->show('delete_commentAdmin'); ?></h4>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Membre</th>
                    <th>Contenu</th>
                    <th>Validation</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($comments as $comment)
            {
            ?>
            <tr>
                <td><?= htmlspecialchars($comment->getPseudo());?></td>
                <td><?= htmlspecialchars($comment->getContent());?></td>
                <td><?= htmlspecialchars($comment->getValid());?></td>
                <td><?= htmlspecialchars($comment->getCreationDate());?></td>
                <td>
                    <a href="index.php?route=validComment&commentId=<?= $comment->getId(); ?>"><button type="button" class="btn btn-success">Valider</button></a>
                </td>
                <td>
                    <a href="index.php?route=confirmDeleteComment&commentId=<?= $comment->getId(); ?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
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
