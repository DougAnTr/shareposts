<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= BASE_URL; ?>"><?= SITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/pages/about">About</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL; ?>/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/login">Login</a>
            </li>
        </ul>
    </div>
</nav>