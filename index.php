<?php

define('_ROOTPATH_', __DIR__);

spl_autoload_register(); //Evite les require

use App\Controller\Controller;

$controller = new Controller();
$controller->route();