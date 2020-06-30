
<?php $this->title = "Accueil"; ?>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <a href="../public/index.php?route=addArticle">Nouvel article</a>
    <?php
    
    foreach($articles as $article)
    {//var_dump($article);
        ?>
        <div>
            <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->GetTitle());?></a></h2>
            <p><?= htmlspecialchars($article->getMiniContent());?></p>
            <p><?= htmlspecialchars($article->getContent());?></p>
            <p><?= htmlspecialchars($article->getPseudo());?></p>
            <p>Créé le : <?= htmlspecialchars($article->getCreationDate());?></p>
            <p>Modifié le : <?= htmlspecialchars($article->getUpdateDate());?></p>
        </div>
        <br>
        <?php
    }
    
    ?>
