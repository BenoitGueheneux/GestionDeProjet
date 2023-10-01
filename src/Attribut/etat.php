<?php

namespace Benoi\GestionDeProjet\Attribut;
use Benoi\GestionDeProjet\Kernel\Model;

class etat extends Model
{
    private string $nom_etat;

    public function getNom_etat(): string {
        return $this->nom_etat;
    }
}