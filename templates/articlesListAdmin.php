<div class="articlewrite">
    <br>
    
    <h3><a href="index.php?action=writeArticleDisplay">Accueil admin</a></h3>
    <h3><a href="index.php?action=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?action=listCommentsAdmin">Gestion des commentaires</a></h3>
    <h3><a href="index.php?action=listUsersAdmin">Gestion des membres</a></h3>
    <br>
    <div class="container mt-4">
        <h1>Articles :</h1><br>
        <p><?= $this->session->show('articlesListAdmin'); ?></p>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Chapô</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Date de création</th>
                    <th>Date de modification</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($articles as $article)
            {
            ?>
            <tr>
                <td><?= htmlspecialchars($article->getTitle());?></td>
                <td><?= htmlspecialchars($article->getMiniContent());?></td>
                <td><?= htmlspecialchars($article->getContent());?></td>
                <td><?= htmlspecialchars($article->getPseudo());?></td>
                <td><?= htmlspecialchars($article->getCreationDate());?></td>
                <td><?= htmlspecialchars($article->getUpdateDate());?></td>
                <td>
                    <a href="index.php?route=editArticleAdmin&articleId=<?= $article->getId(); ?>"><button type="button" class="btn btn-sm btn-outline-success">Modifier</button></a>
                </td>
                <!--<td>
                    <a href="index.php?action=validArticle&amp;id={{article.id}}"><button type="button" class="btn btn-success">Valider</button></a>
                </td>-->
                <td>
                    <a href="index.php?action=confirmdeletearticle&amp;id={{article.id}}"><button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div><br><br>
</div>