<?php

use Application\Model\PessoaFisica;
use Application\Model\PessoaJuridica;

$FixtureCliente = new \Application\Fixtures\Cliente(\Library\Database\Connection::getConnection());
$FixturePF = new Application\Fixtures\PessoaFisica(\Library\Database\Connection::getConnection());
$FixturePJ = new Application\Fixtures\PessoaJuridica(\Library\Database\Connection::getConnection());
$FixtureCliente->dropTable();
$FixtureCliente->createTable();

$FixturePF->dropTable();
$FixturePF->createTable();
$FixturePJ->dropTable();
$FixturePJ->createTable();

$clientes[] = new PessoaJuridica(null,"T&P LDTA","59.717.553/0001-00","Trav das Rosas N 65", "julia@pn.com.br","899999999");
$clientes[] = new PessoaJuridica(null,"A & C SA","59.717.553/0001-02","Avenida das Palmeiras N 50", "paula@pn.com.br","979999999");
$clientes[] = new PessoaJuridica(null,"PBR LTDA","59.717.553/0001-30","Avenida das Palmeiras N 150", "fabia@pn.com.br","999899999");
$clientes[] = new PessoaJuridica(null,"Sol LTDA","59.717.553/0001-66","Avenida das Palmeiras N 750", "p.r@pn.com.br","999999499");
$clientes[] = new PessoaJuridica(null,"P & F SA","59.717.555/0001-00","Avenida das Palmeiras N 450", "contato@pn.com.br","999999969");
//Clientes Pessoa Fisica
$clientes[] = new PessoaFisica(null,"Lua Rego","000.000.000-00","Avenida das Palmeiras N 480", "lua@pn.com.br","999999991");
$clientes[] = new PessoaFisica(null,"Sol Rego","000.000.000-00","Avenida das Palmeiras N 451", "sol@pn.com.br","999999499");
$clientes[] = new PessoaFisica(null,"Paula Silva","000.000.000-00","Rua das Palmeiras N 453", "paula.silva@pn.com.br","999997999");
$clientes[] = new PessoaFisica(null,"Maria Rego","000.000.000-00","Avenida das Ipes N 350", "maria@pn.com.br","999947999");
$clientes[] = new PessoaFisica(null,"Lia Rego","000.000.000-00","Avenida das Palmeiras N 455", "lia.rego@pn.com.br","999779999");

foreach ($clientes as $client){
    $FixtureCliente->persist($client);
}

$pess_fis = $FixturePF->getAll();
$pess_ju = $FixturePJ->getAll();

$clientes = array();
foreach ($pess_fis as $pessoa){

    $clientes[$pessoa->id] = new PessoaFisica($pessoa->id, $pessoa->nome,$pessoa->cpf,$pessoa->endereco, $pessoa->email,$pessoa->telefone);

}
foreach ($pess_ju as $pessoa){
    $clientes[$pessoa->id] = new PessoaJuridica($pessoa->id, $pessoa->nome,$pessoa->cnpj,$pessoa->endereco, $pessoa->email,$pessoa->telefone);

}
