<?php
    require_once('templates/header.php');
    require_once('library/service.php');
    require_once('library/tools.php');

    $services = getServices($pdo);
?>

<h1>Services</h1>
<p>Vous trouverez ci dessous les services que notre garage propose.</p>

</br>

<div class="row">
    <h3>Entretien et réparation</h3>
    <?php foreach ($services as $key => $service) { 
        if ($service['category'] === 'Entretien et réparation') { 
            include('templates/service_partial.php');
        } ?> 
    <?php } ?>
</div>

</br>

<div class="row">
    <h3>Vidange et révision</h3>
    <?php foreach ($services as $key => $service) { 
        if ($service['category'] === 'Vidange et révision') { 
            include('templates/service_partial.php');
        } ?> 
    <?php } ?>
</div>

<?php
    require_once('templates/footer.php');
?>