<?php

namespace Benoi\GestionDeProjet\Entity;
use Benoi\GestionDeProjet\Kernel\Model;

class tache extends Model {
    private  int $id;
    private  string $nom;
    private  string $description;
    private  string $nom_priorite;
    private  string $nom_etat;
    private  string $id_utilisateur;
    private  string $id_projet;

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getNom_priorite(): string {
        return $this->nom_priorite;
    }

    public function getNom_etat(): string {
        return $this->nom_etat;
    }

    public function getId_utilisateur(): string {
        return $this->id_utilisateur;
    }

    public function getId_projet(): string {
        return $this->id_projet;
    }
}
