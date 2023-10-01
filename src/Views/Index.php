<?php include 'header.php'; ?>
<?php
use Benoi\GestionDeProjet\Kernel\Security;
?>
<div class="container mt-5">
    <h2>Connexion</h2>
    <form action="index.php?method=connect" method="post">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="L'email doit être un email valide">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$"
                title="Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial (@#$%^&+=) et avoir une longueur entre 6 et 20 caractères.">
        </div>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>

    <h2 class="mt-4">Inscription</h2>
    <form action="index.php?method=register" method="post">
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
        <button type="submit" class="btn btn-success">S'inscrire</button>
    </form>
</div>

<?php include 'footer.php'; ?>
</body>

</html>