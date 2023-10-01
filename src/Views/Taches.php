<?php include 'header.php';?>
<?php use Benoi\GestionDeProjet\Entity\projet;?>


<div class="container mt-5">
    <h1>Vos tâches</h1>
    <h2>Créer une nouvelle tâche</h2>
    <form action="index.php?controller=controllerTache&method=create" method="post">
        <input type="hidden" id="id_utilisateur" name="id_utilisateur" value="<?=$_SESSION['id']?>">
        <div class="form-group">
            <label for="nom">Nom de la tâche :</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="form-group">
            <label for="description">Description de la tâche :</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="priorite">Priorité de la tâche :</label>
            <select class="form-control" name="priorite">
                <?php foreach ($priorites as $priorite): ?>
                <option value="<?=$priorite->getNom_priorite()?>"><?=$priorite->getNom_priorite()?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="etat">État de la tâche :</label>
            <select class="form-control" name="etat">
                <?php foreach ($etats as $etat): ?>
                <option value="<?=$etat->getNom_etat()?>"><?=$etat->getNom_etat()?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="projet">Projet :</label>
            <select class="form-control" name="projet">
                <?php foreach ($projets as $projet): ?>
                <option value="<?=$projet->getId()?>"><?=$projet->getTitre()?></option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>

    <div class="row mt-4">
        <?php foreach ($taches as $etat => $tachesEtat): ?>
        <div class="col-md-4">
            <h3 class="text-center">État : <?=$etat?></h3>
            <?php foreach ($tachesEtat as $tache): ?>
                <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?=$tache->getNom()?></h5>
                    <p class="card-text">Description : <?=$tache->getDescription()?></p>
                    <p class="card-text">Priorité : <?=$tache->getNom_priorite()?></p>
                    <p class="card-text">Projet : <?=projet::getById($tache->getId_projet())->getTitre()?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="index.php?controller=controllerTache&method=edit&id=<?=$tache->getId()?>&etat=<?=$etat?>&direction=left"
                            class="btn btn-primary">←</a>
                        <a href="index.php?controller=controllerTache&method=delete&id=<?=$tache->getId()?>"
                            class="btn btn-danger">Supprimer</a>
                        <a href="index.php?controller=controllerTache&method=edit&id=<?=$tache->getId()?>&etat=<?=$etat?>&direction=right"
                            class="btn btn-primary">→</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?php include 'footer.php';?>


