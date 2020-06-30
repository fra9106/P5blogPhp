
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
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
    $articles->closeCursor();
    ?>
</div>
</body>
</html>