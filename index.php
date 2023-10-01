<?php

require 'vendor/autoload.php';

use Benoi\GestionDeProjet\Kernel\Dispacher;
use Benoi\GestionDeProjet\Kernel\Model;
use Benoi\GestionDeProjet\Entity\utilisateur;
use Benoi\GestionDeProjet\Configuration\Config;



$dispacher = new Dispacher();
$dispacher->dispatch();
