<?php $this->title = "Liste des messages Admin"; ?>
<div class="articlewrite">
    <br>
    <h3><a href="index.php?route=administration">Accueil Admin</a></h3>
    <h3><a href="index.php?route=addArticle">Rédiger un article</a></h3>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?route=commentsListAdmin">Gestion des commentaires</a></h3>
    <h3><a href="index.php?route=usersListAdmin">Gestion des membres</a></h3>
    <br>
    <div class="container mt-4">
        <h1>Messages :</h1><br>
        <h4 class="red"><?= $this->session->show('message_ListAdmin'); ?></h4>
        <h4 class="red"><?= $this->session->show('delete_messageAdmin'); ?></h4>
        <h4 class="red"><?= $this->session->show('add_message'); ?></h4>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>USERNAME</th>
                    <th>MAIL</th>
                    <th>CONTENU</th>
                    <th>DATE DE CREATION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($messages as $message)
            {
            ?>
            <tr>
                <td><?= htmlspecialchars($message->getUsername());?></td>
                <td><?= htmlspecialchars($message->getMail());?></td>
                <td><?= htmlspecialchars($message->getContent());?></td>
                <td><?= htmlspecialchars($message->getCreationDate());?></td>
                <td>
                    <a href="index.php?route=confirmDeleteMessage&messageId=<?= $message->getId(); ?>"><button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div><br><br>
</div>
