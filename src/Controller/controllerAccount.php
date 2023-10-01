<?php

namespace Benoi\GestionDeProjet\Controller;

use Benoi\GestionDeProjet\Entity\utilisateur;
use Benoi\GestionDeProjet\Kernel\Security;
use Benoi\GestionDeProjet\Kernel\Views;

class controllerAccount
{
    public function index()
    {
        $view = new Views();
        if (Security::is_connected()) {
            $view->setHtml('Account.php');
        } else {
            $view->setHtml('index.php');
        }
        $view->render();
    }

    public function update()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $email = $_SESSION['id'];
        $oldPseudo = $_POST['oldPseudo'];
        $oldPassword = $_POST['oldPassword'];
        if (utilisateur::getByConditions(['id' => $email, 'pseudo' => $oldPseudo])) {
            if (password_verify($oldPassword, utilisateur::getByConditions(['id' => $email, 'pseudo' => $oldPseudo])[0]->getPassword())) {
                $newPseudo = $_POST['newPseudo'];
                $newPassword = $_POST['newPassword'];
                $confirmPassword = $_POST['confirmPassword'];
                if (Security::validatePseudo($newPseudo) && Security::validatePassword($newPassword) && Security::validateConfirmPassword($newPassword, $confirmPassword)) {
                    utilisateur::update($email, ['pseudo' => $newPseudo, 'password' => password_hash($newPassword, PASSWORD_DEFAULT)]);
                }
            }
        }
        self::index();
    }
}
