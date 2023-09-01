<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');

    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/comment.php');
    require_once('../library/tools.php');
    
    if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    $comments = getComments($pdo, _ADMIN_SERVICES_PER_PAGE_, $page);

    $totalComments = getTotalComments($pdo);
    $totalPages = ceil($totalComments/_ADMIN_SERVICES_PER_PAGE_);

?>

<h1 class="py-2">Liste des commentaires</h1>

<div class="col-md-3 mb-3">
    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'ajout_comment.php';">Ajouter un commentaire</button>
</div>

<table class="table">
    <thead>
        <tr class="text-comments">
            <th scope="col">#</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Note</th>
            <th scope="col">Commentaire</th>
        </tr>
    </thead>
    <tbody class="table-comment">
        <?php foreach ($comments as $comment) { ?>
            <tr>
                <th scope="row"><?=$comment['id']; ?></th>
                    <td><?=$comment['nameClient']; ?></td>
                    <td><?=$comment['note']; ?></td>
                    <td><?=$comment['content']; ?></td>
                    <td><a href="ajout_comment.php?id=<?=$comment['id']; ?>">Modifier</a>
                        |<a href="delete_comment.php?id=<?=$comment['id']; ?> onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($totalPages > 1) { ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item">
                <a class="page-link <?php if ($i == $page) { echo " active";} ?>" href="?page=<?php echo $i; ?>">
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