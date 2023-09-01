<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    adminOnly();

    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/service.php');
    

    if (isset($_GET['$page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    $services = getServices($pdo, _ADMIN_SERVICES_PER_PAGE_, $page);

    $totalServices = getTotalServices($pdo);
    $totalPages = ceil($totalServices/_ADMIN_SERVICES_PER_PAGE_);

?>

<h1 class="py-2">Liste des services</h1>

<div class="col-md-3 mb-3">
    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'ajout_service.php';">Ajouter un service</button>
</div>

<table class="table">
    <thead>
        <tr class="text-services">
            <th scope="col">#</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col" style="width: 100px;">Prix</th>
            <th scope="col" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody class="table-service">
        <?php foreach ($services as $service) { ?>
            <tr>
                <th scope="row"><?=$service['id']; ?></th>
                    <td><?=$service['category']; ?></td>
                    <td><?=$service['title']; ?></td>
                    <td><?=$service['description']; ?></td>
                    <td><?=$service['price']; ?> euros</td>
                    <td><a href="ajout_service.php?id=<?=$service['id']; ?>">Modifier</a>
                        |<a href="delete_service.php?id=<?=$service['id']; ?> onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($totalPages > 1) { ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item">
                    <a class="page-link <?php if($i == $page) { echo 'active';} ?>"> href="?page==<?php echo $i; ?>">
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