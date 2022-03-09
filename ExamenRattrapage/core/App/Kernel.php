<?php

namespace App;


class Kernel
{

    public static function run()
    {

//ces deux variables peuvent etre utilisées pour fixer la page d'accueil par défaut

        $type = 'home';
        $action = 'index';

        if(!empty($_GET['type'])) {$type = $_GET["type"];}
        if(!empty($_GET['action'])){ $action = $_GET["action"];}

       
        $type = ucfirst($type);
      
        $nomDeType = "\Controllers\\".$type;

        $controller = new $nomDeType();
        $controller->$action();

    }


}