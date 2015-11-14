<?php

/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 11/11/2015
 * Time: 10:00
 */
namespace Application\Fixtures;
use Application\Model\Abstrato\Cliente as AbstractCliente;
use Application\Model\Abstrato\IPessoaFisica;

class Cliente
{
    private $conn;
    const TABLE_NAME = "Cliente";
    private $clientes;

    public function __construct(\PDO $conn){
        $this->conn = $conn;
    }

    public function persist(AbstractCliente $cliente){

        $this->clientes[] = $cliente;

    }

    public function flush(){

        foreach($this->clientes as $cliente){

            $stmt = $this->conn->prepare("INSERT INTO Cliente (tipo, status) VALUES (:tipo, :status)");
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':status', $status);
            $tipo = $cliente->getTipo();
            $status = $cliente->getStatus();
            $stmt->execute();

            $cliente->setCodigo($this->getLastId());

            if($cliente instanceof IPessoaFisica){
                $FixturePF = new PessoaFisica($this->conn);
                $FixturePF->persist($cliente);

            }else{
                $FixturePJ = new PessoaJuridica($this->conn);
                $FixturePJ->persist($cliente);
            }


        }
    }

    public function getLastId(){
        $sql = "SELECT seq FROM sqlite_sequence WHERE name='Cliente'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row['seq'];

    }

    public function delete(){

    }
    public function update(){

    }
    public function find(){

    }

    public function create(Array $clientes){


    }

    public function dropTable(){
        $sql = "DROP TABLE Cliente";

        $this->conn->exec($sql);
    }
    public function createTable(){
        $sql = <<<"EOF"
       CREATE TABLE "Cliente" (
            `id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
            `tipo`	INTEGER,
            `status`	INTEGER
        );

EOF;
        $this->conn->exec($sql);

    }

}




