<?php
namespace Benoi\GestionDeProjet\Configuration;

class Config
{
    public const CONTROLLER = 'Benoi\GestionDeProjet\Controller\\';
    public const VIEWS = 'Views/';

    public const DSN ='mysql:dbname=gestion_de_projet;host=127.0.0.1';
    public const USER ='root';
    public const PASSWORD ='';

    public const PROVIDER = 'Benoi\GestionDeProjet\Entity\utilisateur';
    public const IDENTIFIANT = 'id';
    public const MOT_DE_PASSE = 'password';

}