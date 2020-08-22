<?php
require_once ROOT . '/resources/views/layouts/default/nav/index.php';
?>

<div class="text-center d-flex justify-content-center pt-5">
    <form class="form-signin col-md-4 py-5" method="post" action="/login">
        <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
        <div class="form-row py-2">
            <label for="login" class="sr-only">Почта</label>
            <input type="tel" id="login" name="login" class="form-control" placeholder="Логин" required="" autofocus="">
        </div>

        <div class="form-row py-2">
            <label for="password" class="sr-only">Пароль</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required="">
        </div>
        <?php
        require_once ROOT.'/resources/views/layouts/errors/index.php';
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Вход</button>
        <p class="mt-5 mb-3 text-muted">© 2020 Серафим Топал</p>
    </form>
</div>