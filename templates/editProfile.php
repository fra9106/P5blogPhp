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
                <div class="  card mb-4">
                  <br> 
               <form method="POST" action="index.php?route=updatePseudo">
                  <div class="form-group"><br><br>
                     <label>Pseudo :</label>
                     <input type="text" name="newpseudo" value="<?= $this->session->get('pseudo'); ?>" />
                     <a href="index.php?action=updateUserPseudo&amp;id={{session.id}} ?>"><button type="submit" name="updateUserPseudo"class="btn btn-success">Je modifie mon Pseudo</button></a><br><br>
                  </div>
               </form>
               <form method="POST" action="index.php?route=updateMail">
                  <div class="form-group">
                     <label>Mail :</label>
                     <input type="text" name="newmail" value="<?= $this->session->get('mail'); ?>" />
                     <a href="index.php?action=updateUserMail&amp;id={{session.id}}"><button type="submit" name="updateUserMail"class="btn btn-success">Je modifie mon Mail</button></a><br><br>
                  </div>
               </form>
               <form method="POST" action="index.php?route=updatePass">
               <h4 class="red"><?= $this->session->show('update_password'); ?></h4>
                  <div class="form-group">
                     <label>Mot de passe :</label>
                     <input type="password" name="newpass" value="password"/>
                     <input type="submit" name="submit"class="btn btn-success" value= "Je modifie mon Mot de passe"><br><br>
                  </div>
               </form>
            </div>
        </div>
    </div>
</div><br><br><br><br>