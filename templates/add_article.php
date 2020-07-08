<?php $this->title = "Nouvel article"; ?><br><br>

<div class="articlewrite">
    <h2>Bonjour</h2>
    <h3><a href="index.php?route=articlesListAdmin">Gestion des articles</a></h3>
    <h3><a href="index.php?route=commentsListAdmin">Gestion des commentaires</a></h3>
    <br />
    <h1>Rédaction Articles : </h1>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form class="form " method="post" action="public/index.php?route=addArticle">
            <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <input class="form-control formcont mt-0 mb-0" type="text" placeholder="title" id="title" name="title" />
                    </div>
                </div>  

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <input class="form-control input-lg formcont  mt-0 mb-0" type="text" placeholder="chapo" id="mini_content" name="mini_content" />
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <textarea class="mytextarea  formcont mt-0 mb-0" name="content" rows="5" cols="50" placeholder="Votre message"></textarea>
                    </div>
                 <input class="btn btn-success mt-4" type="submit" value="Envoyer" id="submit" name="submit"><br><br>
               
            </form>
        </div>
    </div>
</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        entity_encoding: "raw",
        selector: '.mytextarea',
        content_css: 'publics/css/style.css',
        language_url: 'https://olli-suutari.github.io/tinyMCE-4-translations/fr_FR.js',
        language: 'fr_FR'
    });
</script>