<?php include 'header.php';?>
<?php
use Benoi\GestionDeProjet\Kernel\Security;
?>
<div class="container mt-5">
    <h2 class="mt-4">Modification des informations du compte</h2>
    <form action="index.php?controller=controllerAccount&method=update" method="post">
    <div class="form-group">
            <label for="oldPseudo">Ancien pseudo :</label>
            <input type="text" class="form-control" id="oldPseudo" name="oldPseudo" required pattern=".{3,20}"
                title="Le pseudo doit contenir entre 3 et 20 caractères.">
        </div>
        <div class="form-group">
            <label for="newPseudo">Nouveau pseudo :</label>
            <input type="text" class="form-control" id="newPseudo" name="newPseudo" required pattern=".{3,20}"
                title="Le pseudo doit contenir entre 3 et 20 caractères.">
        </div>

        <div class="form-group">
            <label for="oldPassword">Ancien mot de passe :</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword" required
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">
        </div>
        <div class="form-group">
            <label for="newPassword">Nouveau mot de passe :</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword" required
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer nouveau mot de passe :</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>

<?php include 'footer.php';?>
</body>

</html>