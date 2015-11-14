<?php

use Application\Model\PessoaFisica;
use Application\Model\PessoaJuridica;

$FixturePF = new Application\Fixtures\PessoaFisica(\Library\Database\Connection::getConnection());
$FixturePJ = new Application\Fixtures\PessoaJuridica(\Library\Database\Connection::getConnection());




$pess_fis = $FixturePF->getAll();
$pess_ju = $FixturePJ->getAll();

$clientes = array();
foreach ($pess_fis as $pessoa){

    $clientes[$pessoa->id] = new PessoaFisica($pessoa->id, $pessoa->nome,$pessoa->cpf,$pessoa->endereco, $pessoa->email,$pessoa->telefone);

}
foreach ($pess_ju as $pessoa){
    $clientes[$pessoa->id] = new PessoaJuridica($pessoa->id, $pessoa->nome,$pessoa->cnpj,$pessoa->endereco, $pessoa->email,$pessoa->telefone);

}
