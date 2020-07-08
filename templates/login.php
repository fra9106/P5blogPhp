<?php $this->title = "Connexion"; ?>
<div class="register">
    <div class="container mt-4">
    <?= $this->session->show('error_login'); ?>
        <form action="index.php?route=login" method="post">
            <div class="form-group">
                <input type="text" placeholder="Pseudo" id="pseudo" required name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de passe" id="pass" required name="pass" class="form-control">
            </div>
            <br><br><br><br><br><br><br<br><br>
           <div class="form-group">
                <input type="submit" class="btn btn-success" value="Je me connecte !" id="submit" name="submit">
           </div><br><br><br><br><br><br<br><br><br><br>
        </form>
    </div>
</div>