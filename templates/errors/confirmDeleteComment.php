<?php $this->title = "Confirmer suppression commentaire"; ?>
<div class="jumbotron text-center"><br><br>
    <h3>
            Vous êtes sur le point de supprimer le commentaire <br>de : <?= htmlspecialchars($comment->getPseudo());?><br> du : <?= htmlspecialchars($comment->getCreationDate());?> 
    </h3>
</div>
<br><br>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-sm-12 col-md-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <p class="card-text">Voulez-vous vraiment supprimer le commentaire : <br><?= htmlspecialchars($comment->getContent());?>  ?</p>
                    <a href="index.php?route=deleteCommentAdmin&commentId=<?= $comment->getId(); ?>"><button type="button" class="btn  btn-danger">Supprimer</button></a><br><br>
                    <p class="card-text">Retour à la liste des articles</p>
                    <a href="index.php?route=commentsListAdmin"><button type="button" class="btn btn-success">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
