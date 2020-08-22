<?php
if (!empty($user)):
    if ($user->role == "admin"):
        ?>
        <div class="row mx-1">
            <?php if ($task->completed != "true"): ?>
            <?php
                $href = \app\Services\Task\TaskHandler::make()->hrefGenerator();
                ?>
            <a type="button"
               class="btn btn-success btn-sm mr-2"
               href="complete-task?id=<?= $task->id; ?><?= $href; ?>">
                Выполнить
            </a>
            <?php endif; ?>
            <a class="btn btn-secondary btn-sm text-white"
               href="/edit?taskId=<?= $task->id; ?>">
                Редактировать
            </a>
        </div>
    <?php
    endif;
endif;
?>
