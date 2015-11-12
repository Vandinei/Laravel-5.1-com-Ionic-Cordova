<?php

namespace Application\Model;
use  Application\Model\Abstrato\Cliente;
use  Application\Model\Abstrato\IEnderecoResidencial;
use  Application\Model\Abstrato\IPessoaFisica;

class PessoaFisica extends Cliente implements IPessoaFisica, IEnderecoResidencial
{
    private $cpf;

    public function  __construct($codigo, $nome, $cpf, $endereco, $email, $fone){
        parent:: __construct($codigo, $nome, IPessoaFisica::TIPO_PF, $endereco, $email, $fone);
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
