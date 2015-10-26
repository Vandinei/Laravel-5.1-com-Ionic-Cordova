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
        '/cliente'=>'/cliente/clientes.phtml',
        '/cliente/id'=>'/cliente/cliente.phtml',

    ];

$getRota = function(){

    if(!isset($_SERVER['QUERY_STRING']))
        return $_SERVER['PATH_INFO'];

    $acction =  $_SERVER['PATH_INFO'];

    $keys = array_keys($_GET);

    return $acction."/".implode('/',$keys);

};

$isRota = function($rota) use ($rotas){

    if(array_key_exists($rota,$rotas))
        return true;

    return false;

};