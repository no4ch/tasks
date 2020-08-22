<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
    <a class="navbar-brand" href="/">Главная</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php if (isset($_COOKIE["id"]) && isset($_COOKIE["hash"])): ?>
                    <a class="nav-link" href="/logout">Выход<span class="sr-only">(current)</span></a>
                <?php else: ?>
                    <a class="nav-link" href="/login">Вход<span class="sr-only">(current)</span></a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>