<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Projet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand mx-3" href="index.php">
                Gestion de Projet
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="navbarButton">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=controllerAccount">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=controllerProjet">Projets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=controllerTache">Taches</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <script>
        const navbarButton = document.getElementById("navbarButton");
        const navbarNav = document.getElementById("navbarNav");

        navbarButton.addEventListener("click", function () {
            navbarNav.classList.toggle("show");
        });
    </script>
</body>

</html>
<?php use Benoi\GestionDeProjet\Kernel\Security;?>