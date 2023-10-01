<?php

namespace Benoi\GestionDeProjet\Entity;
use Benoi\GestionDeProjet\Kernel\Model;

class utilisateur extends Model {

    private string $id;
    private string $pseudo;
    private string $password;

    public function getId(): string {
        return $this->id;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getPassword(): string {
        return $this->password;
    }
    
}