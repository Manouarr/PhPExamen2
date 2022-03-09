<?php

namespace Models;

class Cinema extends AbstractModel implements \JsonSerializable
{


    protected string $nomDeLaTable = "cinemas";
    private int $id;
    private string $nom;
    private string $adresse;
    private string $ville;






    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




    /**
     * @param $nom
     * @return void
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }




    /**
     * @param $adresse
     * @return void
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }




    /**
     * @param $ville
     * @return void
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }




    /**
     * Json Serialiser
     * @return array
     */
    public function jsonSerialize()
    {
        return ["id" => $this->id, "name" => $this->nom, "address" => $this->adresse, "city" => $this->ville];
    }




    /**
     * @param Cinema $cinema
     * @return void
     */
    public function save(Cinema $cinema)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} (nom, adresse, ville) VALUES (:nom, :adresse, :ville)");
        $sql->execute([
            'nom' => $cinema->nom,
            'adresse' => $cinema->adresse,
            'ville' => $cinema->ville
        ]);
    }





}