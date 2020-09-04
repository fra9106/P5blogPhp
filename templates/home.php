<?php $this->title = "Home"; ?>
<header class=" masthead bg-primary slider text-white text-center">
    <div class="container align-items-center ">
        <h2 class="bienvenu reveal">Bienvenu sur mon blog</h2>
       
        <div class="reveal-fas" >
            <p class="pseudosession">
                <?= $this->session->show('login'); ?>
                <?= $this->session->show('logout'); ?>
                <?= $this->session->get('pseudo'); ?>
            </p>
            </div>
            <div id="homeSreen">
            <h1 class=" nom reveal-name">Franck Boutot</h1><span class="webDeveloper">Web developer</span>
            <div class="divider-custom divider-light ">
            <div class="divider-custom-icon">
                <i class=" reveal-fas fas fa-desktop"></i>
            </div>
        </div>
        <p class=" accroche reveal-dev "> Un développeur d'application PHP/SYMFONY près de chez vous ! </p>
        <div class="text-center mt-4">
            <a class=" reveal1 btn btn-secondary btn-xl" href="https://github.com/fra9106">
                <i class="fab fa-github"></i>
                Mon github!
            </a>&nbsp;&nbsp;&nbsp;
            <a class="reveal2 btn btn-secondary btn-xl" href="public/pdf/CV_Boutot_Franck" target="_blank">
                <i class="fas fa-download"></i>
                Mon CV!
            </a>
        </div>
        </div>
    </div>
</header>
<section class=" color page-section" id="contact">
    <div class="container ">
        <br>
        <!-- Contact Section Heading -->
        <h2 class=" reveal1 page-section-heading text-center text-uppercase text-secondary mb-4">Contact</h2>
        <h4 class="red"><?= $this->session->show('add_message'); ?></h4><br>
        
        <div class="divider-custom">
           <div class="divider-custom-icon">
                <i class="reveal2 far fa-envelope-open text-secondary mb-4"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
               <form action="index.php?route=addMessage" method="POST">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2 text-secondary">
                            <label class="reveal1">Nom Prénom</label>
                            <input class="form-control" id="username" name="username" type="text" placeholder="Nom Prénom" required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2 text-secondary ">
                            <label class="reveal2">Email</label>
                            <input class="form-control" id="mail" name="mail" type="email" placeholder="Email" required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2 text-secondary ">
                            <label class="reveal1">Message</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Message" required="required"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                   <div class="form-group">
                        <input class="reveal2 btn btn-secondary btn-xl" type="submit" value="Envoyer !" id="submit" name="submit"><br><br>
                   </div>
                </form>
                <br>
            </div>
        </div>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="public/js/app.js "></script>
    </div>
</section>
