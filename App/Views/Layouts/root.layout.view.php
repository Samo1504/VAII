<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Prehľad a vyhľadávanie archívnych objektov v aplikácii Archívna evidencia.">
    <title><?= App\Configuration::APP_NAME ?></title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/styles.css') ?>">
    <script src="<?= $link->asset('js/script.js') ?>" defer></script>
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= $link->url('home.index') ?>" aria-label="Archívna evidencia – úvod">
            <span class="brand-mark" aria-hidden="true">A</span>
            <span>Archívna evidencia</span>
        </a>

        <nav class="main-nav" aria-label="Hlavná navigácia">
            <a class="nav-link" href="<?= $link->url('home.index') ?>">Zoznam objektov</a>
            <a class="nav-link" href="<?= $link->url('home.contact') ?>">Kontakt</a>
        </nav>

        <?php if ($user->isLoggedIn()) { ?>
            <a class="sign-in-link" href="<?= $link->url('auth.logout') ?>">Odhlásiť sa (<?= e($user->getName()) ?>)</a>
        <?php } else { ?>
            <a class="sign-in-link" href="<?= App\Configuration::LOGIN_URL ?>">Prihlásiť sa</a>
        <?php } ?>
    </div>
</header>
<?= $contentHTML ?>
<footer class="site-footer">
    <p>Archívna evidencia <span aria-hidden="true">·</span> Prehľad historických materiálov</p>
</footer>
</body>
</html>
