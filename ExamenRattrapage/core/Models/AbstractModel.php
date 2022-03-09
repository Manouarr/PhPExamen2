<?php
namespace Models;



abstract class AbstractModel
{

    protected string $nomDeLaTable;


    protected $pdo;

    public function __construct()
    {


        $this->pdo = \Database\PdoMySQL::getPdo();

      
    }

    /**
     * 
     * retourne un tableau contenant TOUS les elements 
     * tous les champs de la table SQL en question
     * 
     * @return array $elements
     * 
     * 
     */
    public function findAll(): array
    {



        $requete = $this->pdo->query("SELECT * FROM {$this->nomDeLaTable}");

        $elements = $requete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $elements;
    }




    /**
     * 
     * trouver un element par son id
     * renvoie un tableau contenant un element
     * 
     * @param integer $id
     * @return array|bool
     * 
     */
    public function findById(int $id)
    {


        $maRequete = $this->pdo->prepare("SELECT * 
                        FROM {$this->nomDeLaTable} WHERE id = :id");

        $maRequete->execute(
            [
                "id" => $id
            ]

        );

        $maRequete->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

        $element = $maRequete->fetch();
    
        return $element;

    }

    /**
     * 
     * supprimer un element de la BDD par le biais de son id
     * 
     * @param object $objetDUneClasse
     * @return void
     * 
     * 
     */
    public function remove($objetDUneClasse): void
    {



        $requeteSuppression = $this->pdo->prepare("DELETE FROM {$this->nomDeLaTable} WHERE id = :id");

        $requeteSuppression->execute([
            "id" => $objetDUneClasse->getId()
        ]);
    }





}



