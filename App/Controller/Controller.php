<?php

namespace App\Controller;

use Exception;

class Controller
{
    public function route(): void 
    {
        try {
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
                        $pageController = new BookController();
                        $pageController->route();
                        break;
                    default:
                        throw new \Exception("Le contrôleur n'existe pas.");
                        break;
                } 
            } else {
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
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
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
