<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf " crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="./"><img class="logo" src="public/img/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./"><span><i class="fa fa-home"></i> Accueil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=articlesList">Articles</a>
                </li>
                <?php if ($this->session->get('pseudo')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=editProfile&amp;id=<?= $this->session->get('id'); ?>">Modifier profil</a>
                </li>
                <?php endif ?>
                <?php if ($this->session->get('pseudo')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=logout">Déconnexion</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?route=register">Inscription</a>
                </li>
                <?php endif ?>
            </ul>
            <span class=" reveal-dev text-white"><?= $this->session->get('pseudo'); ?><br></span>
            <?php if ($this->session->get('id')) : ?>
                <img class=" reveal-dev pic " width="50" src="public/img/users/avatar/<?= $this->session->get('id');?>"alt="photo profil" >
                <?php else: ?>  
            <img class=" reveal-dev pic " width="50" src="public/img/franck.jpg" alt="photo webmaster">
            <?php endif ?>
        </div>
    </nav>
    <div id="content">
        <?= $content ?>
    </div><br><br>
    <footer class="footer text-center text-white footer-dark bg-primary">
        <div class="container">
            <div class="row">
                <!-- Footer Location -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead text-center mb-0">Région PACA
                        <br>06100 NICE</p>
                </div>
                <!-- Footer Social Icons -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Liens</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/franck.boutot">
                        <i class="fab fa-fw fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/home">
                        <i class="fab fa-fw fa-twitter"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://fr.linkedin.com/in/franck-boutot-ab136919a">
                        <i class="fab fa-fw fa-linkedin-in"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/fra9106">
                        <i class="fab fa-github-square"></i>
                    </a>
                </div>
                <!-- Footer About Text -->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Openclassrooms</h4>
                    <p class="lead text-center mb-0">Parcours DA PHP/SYMFONY<br>
                        <a class="open text-center" href="https://openclassrooms.com/fr/paths/59-developpeur-dapplication-php-symfony">Start Openclassrooms</a>&nbsp;
                    </p>
                </div>
                <div class="container mt-4 mb-4">
                    <small>Copyright &copy; monpersoweb.fr 2020 | <a href="index.php?route=legalPage">Mentions légales</a>
                    <?php if($this->session->get('droits') === '1') : ?>
                        <a class="open text-center" href="index.php?route=administration">| Administation</a></small>
                </div>
                <?php endif ?>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top  position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
