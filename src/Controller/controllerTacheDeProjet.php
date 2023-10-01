<?php

namespace Benoi\GestionDeProjet\Controller;

use Benoi\GestionDeProjet\Association\participation;
use Benoi\GestionDeProjet\Attribut\etat;
use Benoi\GestionDeProjet\Attribut\priorite;
use Benoi\GestionDeProjet\Entity\projet;
use Benoi\GestionDeProjet\Entity\tache;
use Benoi\GestionDeProjet\Entity\utilisateur;
use Benoi\GestionDeProjet\Kernel\Security;
use Benoi\GestionDeProjet\Kernel\Views;

class controllerTacheDeProjet
{
    public function index()
    {
        $view = new Views();
        if (Security::is_connected()) {
            $taches = [];
            if (isset($_SESSION['id'])) {
                $taches['Non débuté'] = tache::getByConditions(['id_projet' => $_GET['id_projet'], 'nom_etat' => 'Non débuté']);
                $taches['En cours'] = tache::getByConditions(['id_projet' => $_GET['id_projet'], 'nom_etat' => 'En cours']);
                $taches['Terminé'] = tache::getByConditions(['id_projet' => $_GET['id_projet'], 'nom_etat' => 'Terminé']);
            }
            $priorites = priorite::getAll();
            $etats = etat::getAll();
            $newProjet = new projet();
            if (isset($_SESSION['id'])) {
                $projet = $newProjet->getById($_GET['id_projet']);
            } else {
                $projet = [];
            }
            $newUtilisateur = new utilisateur();
            if (isset($_GET['id_projet'])) {
                $participants = $newUtilisateur->getParticipationByProjetId($_GET['id_projet']);
            } else {
                $participants = [];
            }
            if (in_array(utilisateur::getById($_SESSION['id']), $participants)) {
                if ($projet->getId_utilisateur() == $_SESSION['id']) {
                    $view->setHtml('TachesDeProjetAdmin.php');
                } else {
                    $view->setHtml('TachesDeProjet.php');
                }
            } else {
                $view->setHtml('index.php');
            }
            $view->render([
                'taches' => $taches,
                'priorites' => $priorites,
                'etats' => $etats,
                'projet' => $projet,
                'participants' => $participants,
            ]
            );
        } else {
            $view->setHtml('index.php');
            $view->render();
        }
    }

    public function create()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $priorite = $_POST['priorite'];
        $etat = $_POST['etat'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $id_projet = $_POST['id_projet'];
        tache::insert([$nom, $description, $priorite, $etat, $id_utilisateur, $id_projet], true);
        self::index();
    }

    public function delete()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $id = $_GET['id'];
        tache::delete($id);
        self::index();
    }

    public function edit()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $id = $_GET['id'];
        $etat = $_GET['etat'];
        $direction = $_GET['direction'];
        $rotationRight = ['Non débuté' => 'En cours', 'En cours' => 'Terminé', 'Terminé' => 'Non débuté'];
        $rotationLeft = ['Non débuté' => 'Terminé', 'En cours' => 'Non débuté', 'Terminé' => 'En cours'];
        if ($direction === 'left') {
            $etat = $rotationLeft[$etat];
        } else {
            $etat = $rotationRight[$etat];
        }
        tache::update($id, ['nom_etat' => $etat]);
        self::index();

    }

    public function createUtilisateur()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $confirmPassword = $_POST['confirmPassword'];
        $utilisateur = utilisateur::getById($email);
        if (!$utilisateur) {
            if (Security::validateEmail($email) && Security::validatePseudo($pseudo) && Security::validatePassword($password) && Security::validateConfirmPassword($password, $confirmPassword)) {
                utilisateur::insert([$email, $pseudo, password_hash($password, PASSWORD_DEFAULT)]);
                participation::insert([$email, $_GET['id_projet']]);
            }
        } else {
            $participation = participation::getByConditions(['id' => $email, 'id_projet' => $_GET['id_projet']]);
            if (!$participation) {
                if (Security::validateEmail($email)) {
                    participation::insert([$email, $_GET['id_projet']]);
                }
            }
        }
        self::index();
    }
}
