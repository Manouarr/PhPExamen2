<?php

namespace Controllers;

class Cinema extends AbstractController
{
    protected $defaultModelName = \Models\Cinema::class;


    //************************************Méthode Index (Json) *****************************************/


    /**
     * Méthode renvoyant les données sérialisées (Json)
     * @return void
     */
     public function index()
     {
        return $this->json($this->defaultModel->findAll());
     }





    //************************************Méthode Créer (Json) *****************************************/




    public function new()
    {
        $request = $this->post('json', ['nom' => 'text', 'adresse' => 'text', 'ville' => 'text']);

        if (!$request) {
            return $this->json('erreur requête');
        }

        $cinema = new \Models\Cinema();
        $cinema->setNom($request['nom']);
        $cinema->setAdresse($request['adresse']);
        $cinema->setVille($request['ville']);
        $this->defaultModel->save($cinema);

        return $this->json('ok');
    }



    //************************************Méthode supprimer (Json)*****************************************/



    public function suppr()
    {
        $request = $this->delete('json', ['id'=>'number']);

        if(!$request) {
            return $this->json('Erreur requête', 'delete');
        }

        $cinema = $this->defaultModel->findById($request['id']);

        if(!$cinema) {
            return $this->json('Ce cinéma est introuvable', 'delete');
        }

        $this->defaultModel->remove($request['id']);

        return $this->json('ok', 'delete');
    }
}

