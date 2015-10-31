<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 23/10/2015
 * Time: 23:19
 */

require_once "../src/config.php";

require_once "../src/data/clientes.php";


$content = function() use ($getRota, $isRota, $rotas, $clientes){
    $r = $getRota();

    if($isRota($r)){
        include "../src/Application/view/".$rotas[$r];
    }else {
        header("HTTP/1.0 404 Not Found");
        include "../src/Application/view/layout/404.phtml";
    }

};

include_once "../src/Application/view/layout/layout.phtml";