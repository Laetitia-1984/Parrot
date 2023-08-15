<?php
    require_once('templates/header.php');
    require('library/occasion.php');

    $occasions = getOccasions($pdo);
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1>Liste des voitures d'occasions</h1>
</div>

<div class="row">
    <?php foreach ($occasions as $key => $occasion) { 
        include('templates/occasion_partial.php');
    }?>   
</div>

    <?php
    require_once ('templates/footer.php');
    ?>
            
</div>
