<?php
$page = '';
if (!empty($_GET["page"])){
    $page = '&page='.$_GET["page"];
}
?>
<div class="row pl-3 pt-2">
    <p>Сортировать по (возрастанию):</p>
    <a href="/?sortBy=name&sortType=asc<?= $page; ?>" class="px-3">имени пользователя</a>
    <a href="/?sortBy=email&sortType=asc<?= $page; ?>" class="px-3">email</a>
    <a href="/?sortBy=status&sortType=asc<?= $page; ?>" class="px-3">статусу</a>
</div>

<div class="row pl-3 pt-2">
    <p>Сортировать по (убыванию):</p>
    <a href="/?sortBy=name&sortType=desc<?= $page; ?>" class="px-3">имени пользователя</a>
    <a href="/?sortBy=email&sortType=desc<?= $page; ?>" class="px-3">email</a>
    <a href="/?sortBy=status&sortType=desc<?= $page; ?>" class="px-3">статусу</a>
</div>