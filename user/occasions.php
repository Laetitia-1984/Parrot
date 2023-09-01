<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');

    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/occasion.php');
    require_once('../library/tools.php');

    if (isset($_GET['$page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    $occasions = getOccasions($pdo, _ADMIN_SERVICES_PER_PAGE_, $page);

    $totalOccasions = getTotalOccasions($pdo);
    $totalPages = ceil($totalOccasions / _ADMIN_SERVICES_PER_PAGE_);
?>

<h1 class="py-2">Liste des occasions</h1>

<div class="col-md-3 mb-3">
    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'ajout_occasion.php';">Ajouter une annonce</button>
</div>

<table class="table">
    <thead>
        <tr class="text-services">
            <th scope="col">#</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Année</th>
            <th scope="col">Kms</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody class="table-service">
        <?php foreach ($occasions as $occasion) { ?>
            <tr>
                <th scope="row"><?=$occasion['id']; ?></th>
                    <td><?=$occasion['mark']; ?></td>
                    <td><?=$occasion['model']; ?></td>
                    <td><?=$occasion['year']; ?></td>
                    <td><?=$occasion['km']; ?></td>
                    <td><?=$occasion['price']; ?> euros</td>
                    <td><?=$occasion['description']; ?></td>
                    <td><a href="ajout_occasion.php?id=<?=$occasion['id']; ?>">Modifier</a>
                        |<a href="delete_occasion.php?id=<?=$occasion['id']; ?> 
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</a></td>
                    </tr>
        <?php } ?>
    </tbody>
</table>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($totalPages > 1) { ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item">
                    <a class="page-link <?php if ($i == $page) { echo 'active';} ?>" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav>

<?php 

require_once('templates/footer.php');

?>