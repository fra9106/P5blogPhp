<?php $this->title = 'message'; ?>
<br>
<div class="jumbotron text-center"><br>
    <h1>
        Message de  :  <?= htmlspecialchars($message->getUsername()); ?>
    </h1>
</div><br>
<div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-sm-12 col-md-6"><br>
                <div class=" card mb-4">
                    <div class="card-body">
                        <h2>Message : </h2>
                        <p>Administrateur : <?= $this->session->get('pseudo'); ?></p>
                        <strong>Mail : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($message->getMail()); ?></p>
                        <strong>Contenu : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($message->getContent()); ?></p>
                        <strong>Envoyé le le : </strong><br>
                        <p class="card-text"><?= htmlspecialchars($message->getCreationDate());?></p><br>
                        <a href="index.php?route=messagesListAdmin"><button type="button" class="btn btn-success">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    