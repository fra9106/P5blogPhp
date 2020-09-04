<?php $this->title = "Liste membres"; ?>
<div class="articlewrite">
    <br/>
    <h3><a href="index.php?route=administration">Accueil Admin</a></h3>
    <h3><a href="index.php?route=addArticle">Rédiger un article</a></h3>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?route=commentsListAdmin">Gestion des commentaires</a></h3>
    <h3><a href="index.php?route=messagesListAdmin">Gestion des messages</a></h3>
    <br>
    <div class="container mt-4">
        <h2>Membres :</h2><br>
        <h4 class="red"><?= $this->session->show('delete_user'); ?></h4>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PSEUDO</th>
                    <th>MAIL</th>
                    <th>AVATAR</th>
                    <th>DATE D'INSCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($users as $user)
            {
            ?>
            <tr>
                <td><?= htmlspecialchars($user->getId());?></td>
                <td><?= htmlspecialchars($user->getPseudo());?></td>
                <td><?= htmlspecialchars($user->getMail());?></td>
                <td><?= htmlspecialchars($user->getAvatar());?></td>
                <td><?= htmlspecialchars($user->getCreateDate());?></td>
                <td>
                    <a href="index.php?route=confirmDeleteUserAdmin&userId=<?= $user->getId(); ?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div><br><br>
</div>
