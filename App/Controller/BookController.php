<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{
    public function route(): void 
    {
        try {

            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    
                    default:
                        throw new \Exception("Cette action n'existe pas : ".($_GET['action']));
                        break;
                } 
            } else {
                throw new \Exception("Aucune action détectée.");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function show() 
    {
        try {
            if (isset($_GET['id'])) {

                $id = (int)$_GET['id'];
                //Charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $this->render('book/show', [
                    'book' => $book,
                ]);

            } else {
                throw new \Exception("Aucun id en paramètre.");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }

    }

}
