<?php

namespace Benoi\GestionDeProjet\Kernel;

use Benoi\GestionDeProjet\Configuration\Config;
use Benoi\GestionDeProjet\Entity\utilisateur;

class Security
{
/**
 * Traitement du formulaire de connexion
 *
 * @return void
 */
    public static function connect()
    {
        // Vérifier si une session est déjà active
        if (session_status() == PHP_SESSION_NONE) {
            // Si aucune session active, on démarre une nouvelle session
            session_start();
        }
        if (isset($_GET['method']) && $_GET['method'] === 'connect') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                if (self::search_user($_POST['email'], $_POST['password']) === true) {
                    $_SESSION['connection'] = true;
                    $_SESSION['id'] = $_POST['email'];
                    header('location: http://localhost:3000/index.php');
                } else {
                    echo 'Erreur de connexion';
                }
            }
        } elseif (isset($_SESSION['connection']) && $_SESSION['connection'] === true) {
            header('location: http://localhost:3000/index.php');
        } else {
            session_destroy();
        }
    }

/**
 * Vérifie que l'utilisateur est connecté
 *
 * @return boolean
 */
    public static function is_connected()
    {
        // Vérifier si une session est déjà active
        if (session_status() == PHP_SESSION_NONE) {
            // Si aucune session active, on démarre une nouvelle session
            session_start();
        }
        if (isset($_SESSION['connection']) && isset($_SESSION['id']) && $_SESSION['connection'] === true) {
            return true;
        }
        return false;
    }

/**
 * Déconnecte l'utilisateur
 *
 * @return void
 */
    public static function disconnect()
    {
        if (self::is_connected()) {
            session_unset();
            session_destroy();
            setcookie('PHPSESSID', '', time() - 3600, '/');
        }
    }

    public static function search_user($id, $pwd)
    {

        $provideur = Config::PROVIDER::getByConditions([Config::IDENTIFIANT => $id])[0];
        $getId = 'get' . ucfirst(Config::IDENTIFIANT);
        $getPassword = 'get' . ucfirst(Config::MOT_DE_PASSE);
        if (is_object($provideur) && $id === $provideur->$getId() && password_verify($pwd, $provideur->$getPassword())) {
            return true;
        }
        echo 'Utilisateur introuvable<br>';
        return false;
    }

    public static function verifyCookie()
    {
        if ($_COOKIE['PHPSESSID'] === $_GET['SID']) {
            return true;
        }
        return false;
    }

    public static function validatePassword($password) {
        // Vérifie si le mot de passe contient au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).{6,20}$/', $password)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validatePseudo($name) {
        if (strlen($name) >= 3 && strlen($name) <= 20) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateConfirmPassword($password, $confirm_password) {
        if ($password === $confirm_password) {
            return true;
        } else {
            return false;
        }
    }



}
