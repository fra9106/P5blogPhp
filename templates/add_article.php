<?php $this->title = "Nouvel article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=addArticle">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="mini_content">Châpo</label><br>
        <textarea id="mini_content" name="mini_content"></textarea><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"></textarea><br>
        
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>