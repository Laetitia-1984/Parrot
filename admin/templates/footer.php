<?php
    require_once('../library/config.php');
    require_once('../library/horaires.php');

    $hours = getHours($pdo);
?>

            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>
                <a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="../assets/images/Logo.png" alt="logo garage" width="100">
                </a>
                <div class="row mx-auto my-3">
                    <?php foreach ($hours as $key => $hour) { ?>
                        <div class="col">
                            <?php 
                                include('../templates/hours_partial.php');
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </footer>
        </main>
    </div>
</body>
</html>