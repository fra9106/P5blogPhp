<?php $this->title = "Connexion"; ?>
<div class="register">
    <div class="container text-center mt-4">
        <h2>CONNEXION</h2><br><br>
    <h4 class="red"><?= $this->session->show('error_login'); ?></h4>
    <h4 class="red"><?= $this->session->show('register'); ?></h4>
        <form action="index.php?route=login" method="post">
            <div class="form-group">
                <input type="text"  id="pseudo" placeholder="Pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>" required name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de passe" id="mdp" required name="mdp" class="form-control">
            </div>
            <br><br>
           <div class="form-group">
                <input type="submit" class="btn btn-success" value="Je me connecte !" id="submit" name="submit">
           </div><br><br><br><br><br><br<br><br><br><br>
        </form>
    </div>
</div>
