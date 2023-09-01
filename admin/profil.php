<?php 
        require_once('../library/config.php');
        require_once('../library/session.php');
        adminOnly();
    
        require_once('templates/header.php');
        require_once('../library/pdo.php');
        require_once('../library/user.php');

    if (isset($_GET['$page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    $profils = getProfils($pdo, _ADMIN_SERVICES_PER_PAGE_, $page);

    $totalProfils = getTotalProfils($pdo);
    $totalPages = ceil($totalProfils/_ADMIN_SERVICES_PER_PAGE_);

?>

<h1 class="py-2">Liste des profils</h1>

<div class="col-md-3 mb-3">
    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'ajout_profil.php';">Ajouter un profil</button>
</div>

<table class="table">
    <thead>
        <tr class="text-services">
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody class="table-service">
        <?php foreach ($profils as $profil) { ?>
            <tr>
                <th scope="row"><?=$profil['id']; ?>
                    <td><?=$profil['name']; ?></td>
                    <td><?=$profil['firstname']; ?></td>
                    <td><?=$profil['email']; ?></td>
                    <td><?=$profil['password']; ?></td>
                    <td><a href="ajout_profil.php?id=<?=$profil['id']; ?>">Modifier</a>
                        |<a href="delete_profil.php?id=<?=$profil['id']; ?> onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a></td>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php if ($totalPages > 1) { ?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?php if($i === $page) { echo 'active';} ?>"><a class="page-link" href="?page=<?=$i ;?>"><?=$i ;?></a></li>
        <?php } ?>
    </ul>
</nav>
<?php } ?>

<?php 

require_once('templates/footer.php');

?>