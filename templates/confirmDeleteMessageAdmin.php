<?php $this->title = "Confirmer suppression message"; ?>
<div class="jumbotron text-center"><br><br>
    <h3>
            Vous êtes sur le point de supprimer le message  : <br>" <?= htmlspecialchars($message->getContent());?> "<br>de : 
            <?= htmlspecialchars($message->getUsername());?> envoyé le : <?= htmlspecialchars($message->getCreationDate());?>
    </h3>
</div>
<br><br>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <p class="card-text">Voulez-vous vraiment supprimer ce message ?</p>
                    <a href="index.php?route=deleteMessageAdmin&articleId=<?= $message->getId(); ?>"><button type="button" class="btn  btn-danger">Supprimer</button></a><br><br>
                    <p class="card-text">Retour à la liste des articles</p>
                    <a href="index.php?route=messagesListAdmin"><button type="button" class="btn btn-success">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>