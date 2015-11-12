<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 11/11/2015
 * Time: 11:19
 */

namespace Application\Fixtures;
use Application\Model\PessoaFisica as PF;

class PessoaFisica
{
    private $conn;
    const TABLE_NAME = 'PessoaFisica';

    public function __construct(\PDO $conn){
        $this->conn = $conn;
    }



    public function persist(PF $pf){

        $stmt = $this->conn->prepare("INSERT INTO PessoaFisica (id, tipo, cpf, nome, telefone, email, endereco)
                                      VALUES (:id, :tipo, :cpf, :nome, :telefone, :email, :endereco)");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);

        $id = $pf->getCodigo();
        $tipo = $pf->getTipo();
        $cpf = $pf->getDocumento();
        $nome = $pf->getNome();
        $telefone = $pf->getTelefone();
        $email = $pf->getEmail();
        $endereco = $pf->getEndereco();

        $stmt->execute();

    }
    public function dropTable(){
        $sql = "DROP TABLE  PessoaFisica ";

        $this->conn->exec($sql);
    }
    public function createTable(){
        $sql = <<<"EOF"
           CREATE TABLE "PessoaFisica" (
            `id`	INTEGER NOT NULL UNIQUE,
            `tipo`	INTEGER NOT NULL,
            `cpf`	TEXT NOT NULL,
            `nome`	TEXT NOT NULL,
            `telefone`	TEXT,
            `email`	TEXT,
            `endereco`	TEXT,
            PRIMARY KEY(id)
        );

EOF;
        $this->conn->exec($sql);

    }

    public function getAll(){
        $sql = "SELECT * FROM PessoaFisica";
        $stm = $this->conn->prepare($sql);
        $stm->execute();

        $data = null;

        while($clientesPF = $stm->fetchObject()){

            $data[] = $clientesPF;
        }

        return $data;
    }

}