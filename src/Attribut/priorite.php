<?php

namespace Benoi\GestionDeProjet\Attribut;
use Benoi\GestionDeProjet\Kernel\Model;

class priorite extends Model
{
    private string $nom_priorite;

    public function getNom_priorite(): string {
        return $this->nom_priorite;
    }
}