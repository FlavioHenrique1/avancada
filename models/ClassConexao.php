<?php
namespace Models;

abstract class ClassConexao{

    protected function conectaDB()
    {
        try{
            $con=new \PDO("mysql:host=".HOST.";dbname=".BD."","".USER."","".PASS."");
            return $con;
        }catch (\PDOException $erro){
            return $erro->getMessage();
        }
    }
}