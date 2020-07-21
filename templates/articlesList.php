<?php $this->title = "Liste des articles"; ?>
<br><br><br><br>
<div class="jumbotron text-center"><br><br>
    <h2>
        Liste des articles par catégories
    </h2>
    <p>Bienvenue sur la page des articles de mon blog. Ceux-ci sont soit classé par ces trois catégories ou bien en liste complète. Bonne lecture... </p>
    <div class="btn-group center">
        <a href="index.php?route=articlesByCat&id_category=1"><button type="button" class="btn btn-lg btn-success">Activités</button></a>&nbsp;&nbsp;
        <a href="index.php?route=articlesByCat&id_category=2"><button type="button" class="btn btn-lg btn-success">Objectifs</button></a>&nbsp;&nbsp;
        <a href="index.php?route=articlesByCat&id_category=3"><button type="button" class="btn btn-lg btn-success">Astuces</button></a>
    </div>
</div>
    <div class="container">
    <h1>Mes articles</h1><br>
    <div class="row flex">
    <?php
    foreach($articles as $article)
    {
        ?>
        <div class="col-sm-12 col-md-6 col-lg-3"><br>
                <div class="card  mb-4">
                    <div class="card-body">
                        <strong>Catégorie : <?= htmlspecialchars($article->getCategory());?></strong>
                        <h5 class="card-title">
                        <?= htmlspecialchars($article->GetTitle());?>
                        </h5>
                        <p class="card-text"><?= htmlspecialchars($article->getMiniContent());?></p>
                        <small class="text-muted"><em>De la part de : <?= htmlspecialchars($article->getPseudo());?></p></em></small><br>
                        <small class="text-muted"><em>Crée le : <?= htmlspecialchars($article->getCreationDate());?></em></small><br><br>
                        <?php if ($article->getUpdateDate()) :?>
                        <small class="text-muted"><em>Modifié le : <?= htmlspecialchars($article->getUpdateDate());?></p></em></small><br>
                        <?php endif ?>
                        <div class="btn-group center">
                            <a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><button type="button" class="btn btn-sm btn-outline-success">Lire la suite...</button></a>
                        </div>
                    </div>
                </div>
        </div>
    <?php
}
    ?>
    </div>
</div>