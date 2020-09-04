<?php $this->title = "Confirmer suppression de compte"; ?>
<div class="jumbotron text-center"><br><br>
    <h3>
    <?= $this->session->get('pseudo'); ?> vous êtes sur le point de supprimer votre compte<br>voulez-vous vraiment exécuter cette opération ?
    </h3>
</div>
<br><br>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <p class="card-text">Oui, je veux supprimer mon compte ! </p>
                    <a href="index.php?route=deleteUserAccount"><button type="button" class="btn  btn-danger">Supprimer</button></a><br><br>
                    <p class="card-text">Retour à la page modifier profil</p>
                    <a href="index.php?route=editProfile"><button type="button" class="btn btn-success">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
