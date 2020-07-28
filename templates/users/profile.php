<?php $this->title = 'Mon profil'; ?>


<br>
<div class="jumbotron text-center"><br>
    <h1>
        Profil  :  <?= $this->session->get('pseudo'); ?>
    </h1>
</div><br>
<div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-6"><br>
                <div class=" card mb-4">
                    <div class="card-body">
                        <h2>Fiche <?= $this->session->get('pseudo'); ?></h2>
                        <p>Bonjour <?= $this->session->get('pseudo'); ?></p>
                        <img class="improfil" width="100" src="public/img/users/avatar/<?= htmlspecialchars($user->getAvatar()); ?>"/><br>
                        <strong>Pseudo : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($user->getPseudo()); ?></p>
                        <strong>Mail : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($user->getMail()); ?></p>
                        <strong>Inscrit depuis le : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($user->getCreateDate());?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    