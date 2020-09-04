<?php $this->title = "Confirmer suppression membre Admin"; ?>
<div class="jumbotron text-center"><br><br>
    <h3>
    Vous êtes sur le point de supprimer le compte de : <br><?= htmlspecialchars($user->getPseudo());?> inscrit depuis le <?= htmlspecialchars($user->getCreateDate());?><br>
    voulez-vous vraiment exécuter cette opération ?
    </h3>
</div>
<br><br>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-sm-12 col-md-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <p class="card-text">Oui, je veux supprimer ce compte ! </p>
                    <a href="index.php?route=deleteUserAccountAdmin&userId=<?= $user->getId(); ?>"><button type="button" class="btn  btn-danger">Supprimer</button></a><br><br>
                    <p class="card-text">Retour à la page modifier profil</p>
                    <a href="index.php?route=usersListAdmin"><button type="button" class="btn btn-success">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
