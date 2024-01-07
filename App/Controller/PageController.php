<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void 
    {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    //On appelle la méthode about()
                    $this->about();
                    break;
                case 'home':
                    ///On appelle la méthode about()
                    var_dump('On appelle la méthode home');
                    break;
                default:
                    //Erreur
                    break;
            } 
        } else {
            //On charge la page d'accueil
        }
    }

    protected function about() 
    {
        //On pourrait récupérer les données en faisant appel au modèle
        $this->render('page/about', [
            'test' => 'abc',
            'test2' => 'abc2'
        ]);
    }
}
