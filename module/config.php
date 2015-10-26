<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 23/10/2015
 * Time: 23:58
 */

$title = "Laravel 5.1 com Ionic + Cordova";

$rotas =
    [
        '/'=>'/home/index.phtml',
        '/cliente'=>'/cliente/index.phtml',

    ];

$getRota = function(){
    return $_SERVER['REQUEST_URI'];
};

$isRota = function($rota) use ($rotas){

    if(array_key_exists($rota,$rotas))
        return true;

    return false;

};