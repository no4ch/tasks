<?php if ($countTasks > 3): ?>
    <?php
    $sort = '';
    if (!empty($_GET["sortBy"])) {
        $sort .= "&sortBy=" . $_GET["sortBy"];
    }
    if (!empty($_GET["sortType"])) {
        $sort .= "&sortType=" . $_GET["sortType"];
    }
    ?>
    <div class="row my-2">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2 text-white" role="group" aria-label="First group">
                <a type="button" class="btn btn-secondary mr-2" href="/<?= $sort; ?>">В начало</a>

                <?php
                if (isset($_GET["page"]) && $countTasks > 6):
                    $previousPage = $_GET["page"] - 1;
                    ?>
                    <?php if ($previousPage != 1): ?>
                    <a type="button"
                       class="btn btn-secondary mr-2"
                       href="/&page=<?= $previousPage; ?><?= $sort; ?>">
                        <?= $previousPage; ?>
                    </a>
                <?php endif; ?>
                <?php endif; ?>

                <?php
                $nextPage = empty($_GET["page"]) ? "2" : $_GET["page"] + 1;
                if (!($nextPage * 3 > $countTasks)):
                    ?>
                    <a type="button"
                       class="btn btn-secondary mr-2"
                       href="/&page=<?= $nextPage; ?><?= $sort; ?>">
                        <?= $nextPage; ?>
                    </a>
                <?php endif; ?>

                <?php
                if ($countTasks % 3 != 0) {
                    $lastPage = intdiv($countTasks, 3) + 1;
                } else {
                    $lastPage = intdiv($countTasks, 3);
                }
                ?>
                <?php if (isset($_GET["page"])): ?>
                    <?php if ($_GET["page"] != $lastPage): ?>
                        <a type="button"
                           class="btn btn-secondary mr-2"
                           href="/&page=<?= $lastPage; ?><?= $sort; ?>">
                            В конец
                        </a>
                    <?php endif; ?>
                <?php else:; ?>
                    <a type="button"
                       class="btn btn-secondary mr-2"
                       href="/&page=<?= $lastPage; ?><?= $sort; ?>">
                        В конец
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
endif;
?>