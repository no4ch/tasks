<div class="form-group">
    <label for="name">Имя</label>
    <input type="name"
           class="form-control"
           id="name"
           name="name"
           placeholder="Введите имя"
           value="<?= isset($userName) ? $userName : ''; ?>">
</div>
<div class="form-group">
    <label for="email">Почта</label>
    <input type="text"
           name="email"
           class="form-control"
           id="name"
           placeholder="name@example.com"
           value="<?= isset($userEmail) ? $userEmail : ''; ?>">
</div>
<div class="form-group">
    <label for="text">Текст задачи</label>
    <textarea class="form-control"
              id="text"
              name="text"
              rows="3"><?= isset($taskText) ? $taskText : ''; ?></textarea>
</div>
<?php
require ROOT . "/resources/views/layouts/errors/index.php";
?>
<div class="form-group">
    <button type="submit"
            class="btn btn-primary"
            name="submit"
            value="true">
        <?= isset($buttonName) ? $buttonName : "Добавить задачу"; ?>
    </button>
</div>