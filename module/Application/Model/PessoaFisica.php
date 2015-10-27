<?php

require_once "Cliente.php";
require_once "IEnderecoResidencial.php";
require_once "IPessoaFisica.php";

class PessoaFisica extends Cliente implements IPessoaFisica, IEnderecoResidencial
{
    private $cpf;

    public function  __construct($nome, $cpf, $endereco, $email, $fone){
        parent:: __construct($nome, IPessoaFisica::TIPO_PF, $endereco, $email, $fone);
        $this->cpf = $cpf;

    }

    public function getDocumento()
    {
        return $this->cpf;
    }

    public function setDocumento($documento)
    {
        $this->cpf = $documento;
        return $this;
    }



}