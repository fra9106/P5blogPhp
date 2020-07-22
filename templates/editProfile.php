<?php $this->title = 'Modifier mes infos'; ?>
<br>
<div class="jumbotron text-center"><br><br>
   <h1>
        Modifie le profil de :  <?= $this->session->get('pseudo'); ?>
    </h1>
</div><br>
<div class="container-fluid">
    <div class="row justify-content-center text-center">
        <div class="col-6"><br>
                <div class="  card mb-4"><br>
                <form method="POST" action="index.php?route=getAvatar" enctype="multipart/form-data">
                     <div class="form-group">
                        <label>Ajouter une photo de profil : </label>
                     </div>
                     <div class="form-group">
                     <input type="file" name="avatar"><br><br>
                     <input type="submit" name="submit"class="btn btn-success" value="Ajouter une photo"><br>
                     <h4 class="red"><?= $this->session->show('update_picture'); ?></h4>
                  </div>
                  </form>
               <form method="POST" action="index.php?route=updatePseudo">
               <h4 class="red"><?= $this->session->show('update_pseudo'); ?></h4>
                  <div class="form-group"><br><br>
                     <label>Pseudo :</label>
                     <input type="text" name="newpseudo" value="<?= $this->session->get('pseudo'); ?>" />
                     <input type="submit" name="submit"class="btn btn-success" value= "Je modifie mon pseudo"><br>
                     <?= isset($errors['newpseudo']) ? $errors['newpseudo'] : ''; ?><br>
                  </div>
               </form>
               <form method="POST" action="index.php?route=updateMail">
               <h4 class="red"><?= $this->session->show('update_mail'); ?></h4>
                  <div class="form-group">
                     <label>Mail :</label>
                     <input type="email" name="newmail" value="<?= $this->session->get('mail'); ?>" />
                     <input type="submit" name="submit"class="btn btn-success" value= "Je modifie mon mail"><br>
                     <?= isset($errors['newmail']) ? $errors['newmail'] : ''; ?><br>
                  </div>
               </form>
               <form method="POST" action="index.php?route=updatePass">
               <h4 class="red"><?= $this->session->show('update_password'); ?></h4>
                  <div class="form-group">
                     <label>Mot de passe :</label>
                     <input type="password" name="newpass" value="password"/>
                     <input type="submit" name="submit"class="btn btn-success" value= "Je modifie mon mot de passe"><br>
                     <?= isset($errors['newpass']) ? $errors['newpass'] : ''; ?><br>
                  </div>
                  <div>
                     <a href="index.php?route=confirmDeleteAccount">Supprimer mon compte</a>
                  </div>
               </form>
            </div>
        </div>
    </div>
</div><br><br>
