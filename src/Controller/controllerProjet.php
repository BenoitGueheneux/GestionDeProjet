<?php

namespace Benoi\GestionDeProjet\Controller;

use Benoi\GestionDeProjet\Association\participation;
use Benoi\GestionDeProjet\Entity\projet;
use Benoi\GestionDeProjet\Kernel\Db;
use Benoi\GestionDeProjet\Kernel\Security;
use Benoi\GestionDeProjet\Kernel\Views;

class controllerProjet
{
    public function index()
    {
        $view = new Views();
        if (Security::is_connected()) {
            if (isset($_SESSION['id'])) {
                $projets = projet::getParticipationById($_SESSION['id']);
            } else {
                $projets = [];
            }

            $view->setHtml('Projets.php');
            $view->render([
                'projets' => $projets,
            ]);
        } else {
            $view->setHtml('index.php');
            $view->render();
        };

    }

    public function create()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $id_utilisateur = $_SESSION['id'];
        projet::insert([$titre, $description, $id_utilisateur], true);
        $insertedId = Db::getInstance()->lastInsertId();
        participation::insert([$id_utilisateur, $insertedId]);
        self::index();

    }

    public function delete()
    {
        if (!Security::is_connected()) {
            self::index();
        }
        $id = $_GET['id'];
        $projet = projet::getById($id);
        if($_SESSION['id'] == $projet->getId_utilisateur()){
            projet::delete($id);
        }
        self::index();
    }
}
