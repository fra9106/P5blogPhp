<?php $this->title = "Confirmer suppression article"; ?>
<div class="jumbotron text-center"><br><br>
    <h3>
            Vous êtes sur le point de supprimer l'article : <br><br>" <?= htmlspecialchars($article->getTitle());?> " du <?= htmlspecialchars($article->getCreationDate());?>
    </h3>
</div>
<br><br>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <p class="card-text">Voulez-vous vraiment supprimer cet article et ses commentaires?</p>
                    <a href="index.php?route=deleteArticleAdmin&articleId=<?= $article->getId(); ?>"><button type="button" class="btn  btn-danger">Supprimer</button></a><br><br>
                    <p class="card-text">Retour à la liste des articles</p>
                    <a href="index.php?route=articlesListAdmin"><button type="button" class="btn btn-success">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
