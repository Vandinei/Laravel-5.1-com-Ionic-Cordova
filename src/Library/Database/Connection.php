<?php
/**
 * Created by PhpStorm.
 * User: jeferson.ferreira
 * Date: 11/11/2015
 * Time: 08:37
 */

namespace Library\Database;


class Connection
{
    static private $conn;

    static public function getConnection(Array $config = null){
        $dir =  __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;
        if(self::$conn)
            return self::$conn;
        try{
            self::$conn = new \PDO('sqlite:'.$dir.'database.db');
            return self::$conn;
        }catch (\PDOException $ex){

            echo $ex->getMessage();
            return $ex->getCode();
        }

    }

}


