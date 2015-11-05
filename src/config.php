<?php

/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 23/10/2015
 * Time: 23:58
 */
include_once __DIR__."/SplClassLoader.php";
$loader = new SplClassLoader();
$loader->register();

$title = "Laravel 5.1 com Ionic + Cordova";

$rotas =
    [
        '/'=>'/home/index.phtml',
        '/cliente'=>'/cliente/clientes.phtml',
        '/cliente/id'=>'/cliente/cliente.phtml',
        '/cliente/novo'=>'/cliente/novo.phtml',
        '/cliente/editar/id'=>'/cliente/editar.phtml',
        '/cliente/excluir/id'=>'/cliente/excluir.phtml',

    ];

$getRota = function(){

    $acction = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';

    if(!isset($_SERVER['QUERY_STRING']))
        return $acction;

    $keys = array_keys($_GET);

    return $acction."/".implode('/',$keys);

};

$isRota = function($rota) use ($rotas){

    if(array_key_exists($rota,$rotas))
        return true;

    return false;

};