<div class="jumbotron text-center"><br><br>
    <h1>
    <?= htmlspecialchars($article->getTitle());?>
    </h1>
</div>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-6"><br>
            <div class=" card mb-4">
                <div class="card-body">
                    <strong>Chapô :</strong><br><br>
                    <p class="card-text"><?= htmlspecialchars($article->getMiniContent());?></p>
                    <strong>Contenu : </strong><br><br>
                    <p class="card-text"><?= htmlspecialchars($article->getContent());?></p></p>
                    <small class="text-muted"><em><?= htmlspecialchars($article->getPseudo());?></em></small><br>
                    <small class="text-muted"><em>Crée le : <?= htmlspecialchars($article->getCreationDate());?></em></small><br>
                    <small class="text-muted"><em>Modifié le : <?= htmlspecialchars($article->getUpdateDate());?></em></small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row justify-content-center text-center">
    <div class="encart">
        <br />
    
        <h2>Mon commentaire :</h2>
        
        <div class="container">
            <form action="index.php?action=addComment&amp;id=<?= htmlspecialchars($article->getId());?>" method="post">
                <div class='form-group '>
                    <textarea class="form-control" id="comment" name="content" placeholder="Votre texte"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mb-4">J'envoie mon commentaire !</button><br>
                </div>
            </form>
        </div>
        
        <h3 class="error">Pour l'ajout d'un commentaire, veuillez vous connecter !</h3>

        <div class="container">
            <h2>Vos commentaires :</h2>
            <div class="row justify-content-center text-center">
            <?php
        foreach ($comments as $comment)
        {
            ?>
            
                <div class="col-6"><br>
                    <div class=" card mb-4">
                        <div class="card-body">
                            <p><em>Envoyé le : <?= htmlspecialchars($comment->getCreationDate());?></em></p>
                            <p class="card-text"><?= htmlspecialchars($comment->getContent());?></p>
                            </p>
                            <p class="card-text"><em>De la part de : <?= htmlspecialchars($comment->getPseudo());?></em></p>
                        </div>
                    </div>
                </div>

             <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>
</div><br>
