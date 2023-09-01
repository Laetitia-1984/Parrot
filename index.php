<?php
    require_once('templates/header.php');
    require_once('library/comment.php');
    require_once('library/config.php');

    $comments = getComments($pdo, _HOME_COMMENT_LIMIT_);

?>
<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/Logo.png" class="d-block mx-lg-auto img-fluid" alt="Logo garage" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="title display-5 fw-bold lh-1 mb-3">Garage Vincent Parrot</h1>
        <p class="lead">Bienvenue sur le site du garage de Vincent Parrot. Ici vous trouverez les services que notre atelier propose ainsi qu'une page dédiée aux annonces de voitures d'occasions.<br/>
        Bonne route sur notre site !!!
        </p>
        <a href="commentaire.php" class="link_comment">Laissez un commentaire !!</a>
    </div>

    <div class="row">
        <?php foreach ($comments as $key => $comment) { 
            include('templates/comment_partial.php');
        } ?>
    <?php
        require_once('templates/footer.php');
    ?>
</div>
