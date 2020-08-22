<?php foreach ($tasks as $task): ?>
    <div class="blog-post">
        <div class="d-flex d-flex justify-content-between">
            <h3 class="blog-post-title"><?= $task->user_name ?></h3>
            <div>
                <?= ($task->completed == "true")
                    ? '<small class="text-success">Выполнено</small><br>'
                    : ''; ?>
                <?= ($task->edited_by_admin == "true")
                    ? '<small class="text-success">Отредактировано администратором </small>'
                    : ''; ?>
            </div>
        </div>
        <p>
            <?= $task->text ?>
        </p>
        <p class="blog-post-meta">
            <?= date("H:i:s d-m-Y", strtotime($task->date)) ?> , с почты
            <strong><?= $task->user_email ?></strong>
        </p>
        <?php
        require ROOT . '/resources/views/layouts/default/tasksList/actionButtons/index.php';
        ?>
    </div>
    <hr>
<?php endforeach; ?>

