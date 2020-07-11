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
                        <h2>Mettre à jour ma fiche</h2>
                        <p>Bonjour <?= $this->session->get('pseudo'); ?></p>
                        <strong>Pseudo : </strong><br>
                        <p class="card-text"><?= $this->session->get('pseudo'); ?></p>
                        <strong>Mail : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($user->getMail()); ?></p>
                        <strong>Inscrit depuis le : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($user->getCreateDate());?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>