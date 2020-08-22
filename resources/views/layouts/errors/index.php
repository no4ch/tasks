<?php
//$errors = ['12', 23];
if (isset($errors)) {
    foreach ($errors as $error):
        ?>
        <small class="form-row pl-1 text-danger pt-1 pb-3">
            <?= $error; ?>
        </small>
    <?php endforeach;
} ?>
