<?php
require_once ROOT . '/resources/views/layouts/default/nav/index.php';
?>

<main role="main" class="container center-block ">

    <div class="starter-template bg-light">
        <div class="row bg-white"></div>
        <div class="row">
            <div class="col-md-8 bg-light">
               <?php
               require_once ROOT."/resources/views/layouts/default/sortSwitch/index.php";
               ?>
                <hr>
                <?php
                require_once ROOT . '/resources/views/layouts/default/tasksList/index.php';
                ?>
            </div>
            <div class="col-md-4 bg-white pr-0">
                <?php
                require_once ROOT . '/resources/views/layouts/default/form/index.php';
                ?>
            </div>
        </div>

    </div>
    <?php
    require_once ROOT . "/resources/views/layouts/default/pagination/index.php";
    ?>

</main>