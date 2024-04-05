<?php
   
    $mainMenu = [
        '/accueil/' => 'Accueil',
        '/a_propos/' => 'A propos',
    ];

    $currentURL = rtrim($_SERVER['REQUEST_URI'], '/'); // Nettoie l'URL actuelle
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bookeo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
</head>

<body>
    <div class="container">

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="/assets/images/logo-bookeo.jpg" alt="logo-bookeo" width="90">
                </a>
            </div>

            <ul class="nav nav-pills">
                <?php foreach ($mainMenu as $page => $titre) { ?>
                    <li class="nav-item">
                        <a href="<?= $page; ?>" 
                            class="nav-link <?php if ($_SERVER['REQUEST_URI'] === $page) { echo 'active'; } ?>"><?= $titre; ?>
                        </a>
                    </li>
                <?php } ?>  
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header>
        <main>