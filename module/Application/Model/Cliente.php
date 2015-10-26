<?php

/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 22/10/2015
 * Time: 20:45
 * Crie uma classe com os principais atributos que um cliente deve ter, como nome, cpf, endereço, etc.
 */
class Cliente
{
    private static $lastCodigo = 0;
    protected $codigo;
    protected $nome;
    protected $cpf;
    protected $endereco;
    protected $email;
    protected $telefone;

    public function __construct($nome, $cpf, $endereco, $email, $fone){
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setEndereco($endereco);
        $this->setEmail($email);
        $this->setTelefone($fone);
        $this->codigo = ++self::$lastCodigo;
    }
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCodigo(){
        return $this->codigo;
    }

}