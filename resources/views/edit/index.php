<?php
require_once ROOT . '/resources/views/layouts/default/nav/index.php';
?>
<div class="d-flex justify-content-center">
    <div class="text-center col-sm-6 mt-3 bg-light pt-2">
        <h2>Редактировать задачу</h2>
        <form action="edit?taskId=<?= $task->id; ?>" method="post" class="bg-light py-3 px-2">
            <?php
            $buttonName = "Редактировать задачу";
            $userName = $task->user_name;
            $userEmail = $task->user_email;
            $taskText = $task->text;
            require_once ROOT . "/resources/views/layouts/default/form/fields/index.php";
            ?>
        </form>
    </div>
</div>