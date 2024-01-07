<?php

namespace App\Controller;

use Exception;

class Controller
{
    public function route(): void 
    {
        //isset définit bien que controller est bien dans l'url
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //On charge le controller page
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                case 'book':
                    //On charge le controller book
                    var_dump('On charge BookController');
                    break;
                default:
                    //Erreur
                    break;
            } 
        } else {
            //On charge la page d'accueil
        }
    }

    protected function render(string $path, array $params = []):void 
    {

        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try {

            if (!file_exists($filePath)) {
                throw new Exception("Fichier non trouvé : ".$filePath);
    
            } else {
                extract($params);//Transforme les clés du tableau $params en variables pour les afficher dans la vue
                require_once $filePath;
            }

        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}
