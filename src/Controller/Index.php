<?php

namespace Benoi\GestionDeProjet\Controller;

use Benoi\GestionDeProjet\Entity\utilisateur;
use Benoi\GestionDeProjet\Kernel\Security;
use Benoi\GestionDeProjet\Kernel\Views;

class Index
{
    public function index()
    {
        $view = new Views();
        if (Security::is_connected()) {
            $view->setHtml('indexConnected.php');
        } else {
            $view->setHtml('index.php');
        }
        $view->render();
    }
    public function connect()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            Security::connect();
        }
        self::index();
    }
    public function register()
    {
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        if (Security::validateEmail($email) && Security::validatePseudo($pseudo) && Security::validatePassword($password) && Security::validateConfirmPassword($password, $confirmPassword)) {
            utilisateur::insert([$email, $pseudo, password_hash($password, PASSWORD_DEFAULT)]);
        }
        self::index();
    }
    public function logout()
    {
        Security::disconnect();
        self::index();
    }
    public function update()
    {
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        if (Security::validateEmail($email) && Security::validatePseudo($pseudo) && Security::validatePassword($password) && Security::validateConfirmPassword($password, $confirmPassword)) {
            utilisateur::update($email, ['pseudo' => $pseudo, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
        }
        self::index();
    }
}
