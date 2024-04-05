<?php

define('_ROOTPATH_', __DIR__);

spl_autoload_register(); //Evite les require de fichiers (ici classes) portant les mêmes noms avec génération d'un conflit du coup

use App\Controller\Controller;

$controller = new Controller();
$controller->route();