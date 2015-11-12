<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 12/11/2015
 * Time: 10:09
 */

namespace Application\Fixtures;
use Application\Model\PessoaJuridica as PJ;

class PessoaJuridica
{

    private $conn;
    const TABLE_NAME = 'PessoaJuridica';

    public function __construct(\PDO $conn){
        $this->conn = $conn;
    }



    public function persist(PJ $pj){

        $stmt = $this->conn->prepare("INSERT INTO PessoaJuridica (id, tipo, cnpj, nome, telefone, email, endereco)
                                      VALUES (:id, :tipo, :cpf, :nome, :telefone, :email, :endereco)");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);

        $id = $pj->getCodigo();
        $tipo = $pj->getTipo();
        $cpf = $pj->getDocumento();
        $nome = $pj->getNome();
        $telefone = $pj->getTelefone();
        $email = $pj->getEmail();
        $endereco = $pj->getEndereco();

        $stmt->execute();

    }
    public function dropTable(){
        $sql = "DROP TABLE PessoaJuridica";

        $this->conn->exec($sql);
    }
    public function createTable(){
        $sql = <<<"EOF"
          CREATE TABLE "PessoaJuridica" (
            `id`	INTEGER NOT NULL,
            `tipo`	INTEGER NOT NULL,
            `cnpj`	TEXT NOT NULL,
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
        $sql = "SELECT * FROM PessoaJuridica";
        $stm = $this->conn->prepare($sql);
        $stm->execute();

        $data = null;

        while($clientesPJ = $stm->fetchObject()){
            $data[] = $clientesPJ;
        }

        return $data;
    }
}