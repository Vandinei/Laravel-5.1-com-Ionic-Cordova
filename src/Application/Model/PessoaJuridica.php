<?php

namespace Application\Model;
use  Application\Model\Abstrato\Cliente;
use  Application\Model\Abstrato\IEnderecoComercial;
use  Application\Model\Abstrato\IPessoaJuridica;

class PessoaJuridica extends Cliente implements IPessoaJuridica, IEnderecoComercial
{
    private $cnpj;

    public function  __construct($codigo, $nome, $cnpj, $endereco, $email, $fone){
        parent:: __construct($codigo, $nome, IPessoaJuridica::TIPO_PJ, $endereco, $email, $fone);
        $this->cnpj = $cnpj;

    }

    public function getDocumento()
    {
        return $this->cnpj;
    }

    public function setDocumento($documento)
    {
        $this->cnpj = $documento;
        return $this;
    }


}
