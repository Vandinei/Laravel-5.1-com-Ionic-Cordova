<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 23/10/2015
 * Time: 23:19
 */

require_once "../module/config.php";

require_once "../module/data/clientes.php";


$content = function() use ($getRota, $isRota, $rotas, $clientes){
    $r = $getRota();

    if($isRota($r)){
        include "../module/Application/view/".$rotas[$r];
    }else {
        header("HTTP/1.0 404 Not Found");
        include "../module/Application/view/layout/404.phtml";
    }

};

include_once "../module/Application/view/layout/layout.phtml";