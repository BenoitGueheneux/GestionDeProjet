<?php

namespace Benoi\GestionDeProjet\Controller;

use Benoi\GestionDeProjet\Attribut\etat;
use Benoi\GestionDeProjet\Attribut\priorite;
use Benoi\GestionDeProjet\Entity\projet;
use Benoi\GestionDeProjet\Entity\tache;
use Benoi\GestionDeProjet\Kernel\Security;
use Benoi\GestionDeProjet\Kernel\Views;

class controllerTache
{
    public function index()
    {
        $view = new Views();
        if (Security::is_connected()) {
            $taches = [];
            if (isset($_SESSION['id'])) {
                $taches['Non débuté'] = tache::getByConditions(['id_utilisateur' => $_SESSION['id'], 'nom_etat' => 'Non débuté']);
                $taches['En cours'] = tache::getByConditions(['id_utilisateur' => $_SESSION['id'], 'nom_etat' => 'En cours']);
                $taches['Terminé'] = tache::getByConditions(['id_utilisateur' => $_SESSION['id'], 'nom_etat' => 'Terminé']);
            }
            $priorites = priorite::getAll();
            $etats = etat::getAll();
            if (isset($_SESSION['id'])) {
                $projets = projet::getParticipationById($_SESSION['id']);
            } else {
                $projets = [];
            }
            $view->setHtml('Taches.php');
            $view->render([
                'taches' => $taches,
                'priorites' => $priorites,
                'etats' => $etats,
                'projets' => $projets,
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
        $id_projet = $_POST['projet'];
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

    public function update(){
        var_dump($_POST);
        self::index();
    }
}
