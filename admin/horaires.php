<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    adminOnly();

    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/horaires.php');

    $hours = getHours($pdo);
?>

<h1 class="py-2">Horaires d'ouverture</h1>

<div class="col-md-3 mb-3">
    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'ajout_horaires.php';">Ajouter une horaire</button>
</div>

<table class="table">
    <thead>
        <tr class="text-hours">
            <th scope="col">#</th>
            <th scope="col">Jour</th>
            <th scope="col">Matin</th>
            <th scope="col">Après-midi</th>
            <th scope="col" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody class="table-hours">
        <?php foreach ($hours as $hour) { ?>
            <tr>
                <th scope="row"><?=$hour['id']; ?></th>
                    <td><?=$hour['days']; ?></td>
                    <td><?=$hour['hrsMat']; ?></td>
                    <td><?=$hour['hrsApm']; ?></td>
                    <td><a href="ajout_horaires.php?id=<?=$hour['id']; ?>">Modifier</a>
                        |<a href="delete_horaires.php?id=<?=$hour['id']; ?> onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php 
    require_once('templates/footer.php');
?>

