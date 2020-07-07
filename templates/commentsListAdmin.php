<?php $this->title = "Liste des commentaires Admin"; ?>
<div class="articlewrite">
    <br/>
    <h3><a href="index.php?route=home">Accueil Admin</a></h3>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?action=listUsersAdmin">Gestion des membres</a></h3>
    <br/>
    <div class="container mt-4">
        <h2>Commentaires :</h2><br><br>
        <p><?= $this->session->show('valid_comment'); ?></p>
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
                    <a href="index.php?action=confirmdeletecomment&amp;id={{comment.id}}"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div><br><br>
</div>