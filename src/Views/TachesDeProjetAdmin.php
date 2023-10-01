<?php include 'header.php';?>
<?php use Benoi\GestionDeProjet\Entity\utilisateur;?>

<div class="container mt-5">
    
    <h2 class="mt-4">Créer ou ajouter un nouvel utilisateur sur ce projet</h2>
    <form action="index.php?controller=controllerTacheDeProjet&method=createUtilisateur&id_projet=<?=$projet->getId()?>"
        method="post">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="L'email doit être un email valide">
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo :</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" required pattern=".{3,20}" 
               title="Le pseudo doit contenir entre 3 et 20 caractères.">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password" required
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">

        </div>
        <button type="submit" class="btn btn-success">Créer ou ajouter</button>
    </form>
    <h2>Créer une nouvelle tâche</h2>
    <form action="index.php?controller=controllerTacheDeProjet&method=create&id_projet=<?=$_GET['id_projet']?>"
        method="post">
        <input type="hidden" id="id_projet" name="id_projet" value="<?=$_GET['id_projet']?>">
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
            <label for="id_utilisateur">Utilisateur :</label>
            <select class="form-control" name="id_utilisateur">
                <?php foreach ($participants as $participant): ?>
                <option value="<?=$participant->getId()?>"><?=$participant->getPseudo()?></option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
    <h1>Taches du Projet</h1>
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
                    <p class="card-text">Utilisateur :
                        <?=utilisateur::getById($tache->getId_utilisateur())->getPseudo()?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="index.php?controller=controllerTacheDeProjet&method=edit&id=<?=$tache->getId()?>&etat=<?=$etat?>&direction=left&id_projet=<?=$_GET['id_projet']?>"
                            class="btn btn-primary">←</a>
                        <a href="index.php?controller=controllerTacheDeProjet&method=delete&id=<?=$tache->getId()?>&id_projet=<?=$_GET['id_projet']?>"
                            class="btn btn-danger">Supprimer</a>
                        <a href="index.php?controller=controllerTacheDeProjet&method=edit&id=<?=$tache->getId()?>&etat=<?=$etat?>&direction=right&id_projet=<?=$_GET['id_projet']?>"
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