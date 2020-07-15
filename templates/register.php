<?php $this->title = "Inscription"; ?>
<div class="register">
    <div class="container mt-4">
    <h4 class="red"><?= $this->session->show('register'); ?></h4>
        <form action="index.php?route=register" method="post">
            <div class="form-group">
                <input type="text" placeholder="Pseudo" id="pseudo" required name="pseudo" class="form-control">
                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            </div>
            <div class="form-group">
                <input type="email" placeholder="mail" id="mail" required name="mail" class="form-control">
                <?= isset($errors['mail']) ? $errors['mail'] : ''; ?>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de passe" id="mdp" required name="mdp" class="form-control">
                <?= isset($errors['pass']) ? $errors['pass'] : ''; ?>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirmez Mot de passe" id="mdp2" required name="mdp2" class="form-control">
                <?= isset($errors['pass']) ? $errors['pass'] : ''; ?>
            </div>
            <br><br><br><br><br><br<br><br><br><br>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Je crée mon compte !" id="submit" name="submit">
            </div><br><br><br><br>
        </form>
    </div>
</div>