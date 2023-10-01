<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1>Vos projets</h1>
        <h2>Créer un nouveau projet</h2>
        <form action="index.php?controller=controllerProjet&method=create" method="post">
            <div class="form-group">
                <label for="titre">Nom du Projet :</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="form-group">
                <label for="description">Description du Projet :</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
        <h2 class="mt-4">Liste de vos projets</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du Projet</th>
                    <th>Description</th>
                    <th>Administrateur</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projets as $projet): ?>
                    <tr>
                        <td><a href="index.php?controller=controllerTacheDeProjet&id_projet=<?= $projet->getId() ?>"><?= $projet->getTitre() ?></a></td>
                        <td><?= $projet->getDescription() ?></td>
                        <td><?= $projet->getId_utilisateur() ?></td>
                        <td><a href="index.php?controller=controllerProjet&method=delete&id=<?= $projet->getId() ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
<?php include 'footer.php'; ?>