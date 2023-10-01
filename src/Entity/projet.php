<?php

namespace Benoi\GestionDeProjet\Entity;
use Benoi\GestionDeProjet\Kernel\Model;

class projet extends Model {

    private int $id;
    private string $titre;
    private string $description;
    private string $id_utilisateur;

    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getId_utilisateur(): string {
        return $this->id_utilisateur;
    }
}